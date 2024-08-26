<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
    header("Location: ../works/log_in_form.html");
    exit;
}

$prof_id = $_SESSION['prof_id'];

function updateAttendance($conn, $student_no, $class_no, $status, $date) {
    $stmt = $conn->prepare("UPDATE attendance SET status = ?, date = ? WHERE student_no = ? AND class_no = ?");
    $stmt->bind_param("ssss", $status, $date, $student_no, $class_no);

    if ($stmt->execute()) {
        return "success";
    } else {
        return "error: " . $stmt->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_no = $_POST['student_no'];
    $class_no = $_POST['class_no'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    echo updateAttendance($conn, $student_no, $class_no, $status, $date);
    exit;
}

$courses_stmt = $conn->prepare("
    SELECT co.course_code, c.class_no
    FROM courses co
    JOIN class c ON co.courses_id = c.courses_id
    WHERE c.prof_id = ?
");
$courses_stmt->bind_param("s", $prof_id);
$courses_stmt->execute();
$courses_result = $courses_stmt->get_result();
$courses_data = $courses_result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendify</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">
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

      <div id="courses-page" class="page active">
        <header>
          <h1>COURSES</h1>
        </header>
        <div class="courses">
          <?php foreach ($courses_data as $course): ?>
            <div class="course" onclick="showClasses('<?php echo $course['class_no']; ?>')">
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
          <?php foreach ($courses_data as $course): ?>
            <div class="class" onclick="showAttendance('<?php echo $course['class_no']; ?>')">
              <?php echo $course['class_no']; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div id="attendance-page" class="page">
        <header>
          <h1>Attendance</h1>
        </header>
        <table>
          <tr>
            <th>Student Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Present</th>
            <th>Absent</th>
            <th>Excused</th>
          </tr>
          <tbody id="attendance-tbody">

          </tbody>
        </table>
        <button class="upload">Upload Students</button>
        <button class="save">Save</button>
      </div>
    </div>
  </div>
  <script src="../js/professor_dashboard.js"></script>
</body>
</html>
