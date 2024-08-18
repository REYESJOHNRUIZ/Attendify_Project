<?php
session_start();
if (!isset($_SESSION['student_number'])) {
    header("Location: ../works/log_in_form.html");
    exit();
}

require '../db_connect.php';

$student_number = $_SESSION['student_number'];
$stmt = $conn->prepare("SELECT * FROM student WHERE student_number = ?");
$stmt->bind_param("s", $student_number);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

$stmt = $conn->prepare("SELECT DISTINCT date FROM attendance WHERE student_no = ?");
$stmt->bind_param("s", $student_number);
$stmt->execute();
$dates_result = $stmt->get_result();
$dates = [];
while ($row = $dates_result->fetch_assoc()) {
    $dates[] = $row['date'];
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
    <script type="text/javascript" src="../js/student_dashboard_script.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <h1>ATTENDIFY</h1>
        <div class="profile">
            <img src="path-to-profile-image" alt="Profile Picture">
            <h2>Welcome back, <?php echo htmlspecialchars($student['firstname']); ?>!</h2>
            <p>Name: <?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></p>
            <p>Email: <?php echo htmlspecialchars($student['email']); ?></p>
            <p>Student no.: <?php echo htmlspecialchars($student['student_number']); ?></p>
            <p>User: S001</p> <!-- Assuming user code is static or retrieved elsewhere -->
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
</body>
</html>