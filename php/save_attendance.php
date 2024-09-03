<?php
session_start();
require '../db_connect.php';

$input = json_decode(file_get_contents('php://input'), true);

$class_no = $input['class_no'];
$date = $input['date'];
$attendanceData = $input['attendance'];


foreach ($attendanceData as $attendance) {
    $student_no = $attendance['student_no'];
    $status = $attendance['status'];


    $stmt = $conn->prepare("
        INSERT INTO attendance (class_no, student_no, date, status)
        VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE status = VALUES(status)
    ");
    $stmt->bind_param("ssss", $class_no, $student_no, $date, $status);

    if (!$stmt->execute()) {
        echo json_encode(['success' => false]);
        exit;
    }
}

echo json_encode(['success' => true]);
?>
