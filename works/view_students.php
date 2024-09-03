<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
    header("Location: ../works/log_in_form.html");
    exit;
}

// Fetch professor's courses
$prof_id = $_SESSION['prof_id'];
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

// Fetch students not enrolled in any of the professor's classes
$students_stmt = $conn->prepare("
    SELECT s.id, s.firstname, s.middlename, s.lastname, s.birthday, s.age, s.gender, s.address, s.email, s.phone
    FROM student s
    LEFT JOIN class c ON s.id = c.student_no AND c.prof_id = ?
    WHERE c.student_no IS NULL
");
$students_stmt->bind_param("s", $prof_id);
$students_stmt->execute();
$students_result = $students_stmt->get_result();
$students_data = $students_result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles/view_students_styles.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Student List</h1>
    </header>
    <button class="back" onclick="location.href='professor_dashboard.php'"><i class="fas fa-arrow-left"></i> BACK</button>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Birthday</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students_data as $student): ?>
          <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['firstname']; ?></td>
            <td><?php echo $student['middlename']; ?></td>
            <td><?php echo $student['lastname']; ?></td>
            <td><?php echo $student['birthday']; ?></td>
            <td><?php echo $student['age']; ?></td>
            <td><?php echo $student['gender']; ?></td>
            <td><?php echo $student['address']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['phone']; ?></td>
            <td>
            <form action="../php/enroll_student.php" method="POST">
                <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                <select name="class_no">
                  <?php foreach ($courses_data as $course): ?>
                    <option value="<?php echo $course['class_no']; ?>"><?php echo $course['course_code'] . " " . $course['class_no']; ?></option>
                  <?php endforeach; ?>
                </select>
                <button type="submit">Enroll</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
