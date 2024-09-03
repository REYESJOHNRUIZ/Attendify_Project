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