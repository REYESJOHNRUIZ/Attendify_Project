<?php
session_start();
require '../db_connect.php';

if (!isset($_POST['student_id']) || !isset($_POST['class_no'])) {
    die("Error: Missing required fields.");
}

$student_id = $_POST['student_id'];
$class_no = $_POST['class_no'];
$prof_id = $_SESSION['prof_id'];

// Fetch the student number based on student ID
$student_stmt = $conn->prepare("SELECT student_number FROM student WHERE id = ?");
$student_stmt->bind_param("s", $student_id);
$student_stmt->execute();
$student_result = $student_stmt->get_result();
$student = $student_result->fetch_assoc();

if (!$student) {
    die("Error: Student not found.");
}

$student_no = $student['student_number'];

// Check if the student is already enrolled in the class
$check_stmt = $conn->prepare("
    SELECT * FROM class WHERE student_no = ? AND class_no = ? AND prof_id = ?
");
$check_stmt->bind_param("sss", $student_no, $class_no, $prof_id);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    echo "Student is already enrolled in this class.";
} else {
    // Enroll the student in the class
    $enroll_stmt = $conn->prepare("
        INSERT INTO class (student_no, class_no, prof_id, datetime_created, datetime_updated)
        VALUES (?, ?, ?, NOW(), NOW())
    ");
    $enroll_stmt->bind_param("sss", $student_no, $class_no, $prof_id);

    if ($enroll_stmt->execute()) {
        header("Location: ../works/view_students.php?enrollment_success=1");
        exit;
    } else {
        echo "Failed to enroll student.";
    }
}
?>
