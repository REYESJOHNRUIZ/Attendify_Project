<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
    header("Location: ../works/log_in_form.html?error=notloggedin");
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$class_no = $data['class_no'];
$date = $data['date'];
$attendance = $data['attendance'];

foreach ($attendance as $record) {
    $student_no = $record['student_no'];
    $status = $record['status'];


    $stmt = $conn->prepare("
        SELECT attendance_id FROM attendance 
        WHERE class_no = ? AND student_no = ? AND date = ?
    ");
    $stmt->bind_param("sss", $class_no, $student_no, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $stmt = $conn->prepare("
            UPDATE attendance 
            SET status = ?, datetime_updated = NOW()
            WHERE class_no = ? AND student_no = ? AND date = ?
        ");
        $stmt->bind_param("ssss", $status, $class_no, $student_no, $date);
    } else {

        $stmt = $conn->prepare("
            INSERT INTO attendance (attendance_id, class_no, student_no, date, status, datetime_created, datetime_updated) 
            VALUES (UUID(), ?, ?, ?, ?, NOW(), NOW())
        ");
        $stmt->bind_param("ssss", $class_no, $student_no, $date, $status);
    }
    $stmt->execute();
}

echo json_encode(['success' => true]);
?>
