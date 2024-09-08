<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
  header("Location: ../works/log_in_form.php");
}

if (!isset($_SESSION['prof_name'])) {
  die("Error: 'prof_name' is not set in session. Please check your login process.");
}

$prof_id = $_SESSION['prof_id'];

$courses_stmt = $conn->prepare("
    select courses.* from professor
    join courses on courses.course_code = professor.course
    where prof_id = ?
");

$courses_stmt->bind_param("s", $prof_id);
$courses_stmt->execute();
$courses_result = $courses_stmt->get_result();
$courses_data = $courses_result->fetch_all(MYSQLI_ASSOC);
$data = $courses_data[0];
$course_id = $data['courses_id'];
$course_name = $data['course_code'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendify</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Public+Sans:wght@300;400;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../styles/professor_dashboard_styles.css">
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <div class="profile">
        <h2>ATTENDIFY</h2>
        <div class="prof-icon">
          <img src="../assets/images/professor-pic.png" alt="Professor Icon">
        </div>
        <div class="info">
          <h2><?php echo $_SESSION['prof_name']; ?></h2>
          <p>Username: <?php echo $_SESSION['prof_id']; ?></p>
        </div>
      </div>
      <div class="bottom-items">
        <button class="back" onclick="goBack()">
          <i class="fas fa-arrow-left"></i> BACK
        </button>
        <button class="logout" onclick="location.href='../php/logout.php'">
          <i class="fas fa-sign-out-alt"></i> LOG OUT
        </button>
      </div>
    </div>
    <div class="main-content">
      <header>
        <h1>Professor Dashboard</h1>
      </header>
      <div id="courses-page" class="page active">
        <header>
          <h1>COURSES</h1>
        </header>
        <div class="courses">
          <?php foreach ($courses_data as $course): ?>
            <div class="course" onclick="showClasses('<?php echo $course_id; ?>')">
              <?php echo $course['course_code']; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div id="classes-page" class="page">
        <header>
          <h1>CLASSES</h1>
        </header>
        <div class="classes">
          <!-- Classes will be dynamically loaded based on selected course -->
        </div>
      </div>

      <div id="attendance-page" class="page">
        <header>
          <h1 id="class-header"></h1>
        </header>

        <div class="date-picker-container">
          <label for="attendance-date-picker">Select Date: </label>
          <input type="date" id="attendance-date-picker" onchange="updateAttendanceDate()">
        </div>
        <a class="view-students" href="view_students.php">ViewStudents</a>

        <table>
          <thead>
            <tr>
              <th>Student Number</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Present</th>
              <th>Absent</th>
              <th>Excused</th>
            </tr>
          </thead>
          <tbody id="attendance-tbody">
          </tbody>
        </table>
        <button class="upload" onclick="saveAttendance()">Save Attendance</button>
        <button class="upload" onclick="downloadData()">DownloadData</button>
      </div>
    </div>
  </div>
  <script src="../js/professor_dashboard.js"></script>
</body>

</html>