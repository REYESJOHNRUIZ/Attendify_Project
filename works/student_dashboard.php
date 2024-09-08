<?php
session_start();
if (!isset($_SESSION['student_number'])) {
    header("Location: ../works/log_in_form.php");
    exit();
}

require '../db_connect.php';

$student_number = $_SESSION['student_number'];

// Fetch student data
$stmt = $conn->prepare("SELECT * FROM student WHERE student_number = ?");
$stmt->bind_param("s", $student_number);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

// Fetch section information (class_no)
$stmt = $conn->prepare("
    SELECT class.class_no 
    FROM class 
    WHERE class.student_no = ?");
$stmt->bind_param("s", $student_number);
$stmt->execute();
$section_result = $stmt->get_result();
$section = $section_result->fetch_assoc();

// Check if section data exists and store it in session
if ($section) {
    $_SESSION['section'] = $section['class_no'];
} else {
    $_SESSION['section'] = 'N/A'; // Default value if section is not found
}

// Fetch attendance dates
$stmt = $conn->prepare("SELECT DISTINCT date, status FROM attendance WHERE student_no = ?");
$stmt->bind_param("s", $student_number);
$stmt->execute();
$dates_result = $stmt->get_result();
$dates = [];
while ($row = $dates_result->fetch_assoc()) {
    $dates[$row['date']] = $row['status'];
}

$dates_json = json_encode($dates);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../styles/student_dashboard_styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const attendanceDates = <?php echo $dates_json; ?>;
    </script>
</head>

<body>
    <div class="sidebar">
        <h1>ATTENDIFY</h1>
        <div class="profile">
            <img src="../assets/images/stdnIcon.png" alt="Profile Picture">
            <h2>Welcome back, <?php echo htmlspecialchars($student['firstname']); ?>!</h2>
            <p>Name: <?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></p>
            <p>Email: <?php echo htmlspecialchars($student['email']); ?></p>
            <p>Student no.: <?php echo htmlspecialchars($student['student_number']); ?></p>
            <p>Section: <?php echo htmlspecialchars($_SESSION['section']); ?></p>
        </div>
        <button id="logout_button">LOG OUT</button>
    </div>
    <div class="main-content">
        <h2>Student Dashboard</h2>
        <div class="attendance-panel">
            <div class="attendance-header">
                <select>
                    <option value="webdev">Web Dev</option>
                </select>
                <button id="view_attendance">View</button>
            </div>
            <div class="attendance-details">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('attendanceChart').getContext('2d');
            const attendanceKeys = Object.keys(attendanceDates).map(date => date);
            const attendanceValues = Object.values(attendanceDates).map(status => status);
            const statusMapping = {
                "Present": 1,
                "Absent": 0,
                "Excused": 0.5
            };

            // Map attendanceValues to numerical data for plotting on Y-axis
            const attendanceNumericalValues = attendanceValues.map(status => statusMapping[status]);

            // Chart.js data object
            const data = {
                labels: attendanceKeys, // X-axis labels (dates)
                datasets: [{
                    label: 'Attendance',
                    data: attendanceNumericalValues, // Y-axis numerical data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Chart configuration
            const config = {
                type: 'bar', // Use a bar chart or any other chart type
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                // Custom Y-axis labels for statuses
                                callback: function (value, index, values) {
                                    const statusLabels = ["Absent", "Late", "Present"];
                                    return statusLabels[value];
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    // Return the status text instead of the number in tooltips
                                    const statuses = attendanceValues[tooltipItem.dataIndex];
                                    return `Status: ${statuses}`;
                                }
                            }
                        }
                    }
                }
            };
            // const data = {
            //     labels: attendanceKeys, // X-axis labels (dates)
            //     datasets: [{
            //         label: 'Attendance',
            //         data: attendanceValues,
            //         backgroundColor: 'rgba(75, 192, 192, 0.2)',
            //         borderColor: 'rgba(75, 192, 192, 1)',
            //         borderWidth: 1
            //     }]
            // };

            // const config = {
            //     type: 'line', // You can change this to 'bar', 'pie', etc.
            //     data: data,
            //     options: {
            //         scales: {
            //             y: {
            //                 beginAtZero: true,
            //                 title: {
            //                     display: true,
            //                     text: 'Attendance Count'
            //                 }
            //             },
            //             x: {
            //                 title: {
            //                     display: true,
            //                     text: 'Date'
            //                 }
            //             }
            //         }
            //     }
            // };

            const attendanceChart = new Chart(ctx, config);

            // Logout button functionality
            const logoutButton = document.getElementById("logout_button");
            if (logoutButton) {
                logoutButton.addEventListener("click", function () {
                    location.href = "../php/logout.php";
                });
            }
        });
    </script>
</body>

</html>