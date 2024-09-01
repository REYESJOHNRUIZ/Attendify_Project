<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
    header("Location: ../works/log_in_form.html?error=notloggedin");
    exit();
}

$class_no = $_GET['class_no'];
$date = $_GET['date'];

$stmt = $conn->prepare("SELECT a.attendance_id, a.date, a.status, a.class_no, a.student_no, s.firstname AS first_name, s.lastname AS last_name
                        FROM attendance a
                        INNER JOIN student s ON a.student_no = s.student_number
                        WHERE a.class_no = ? AND a.date = ?");
$stmt->bind_param("ss", $class_no, $date);
$stmt->execute();
$result = $stmt->get_result();

$attendance_data = [];

while ($row = $result->fetch_assoc()) {
    $attendance_data[] = array(
        'attendance_id' => $row['attendance_id'],
        'date' => $row['date'],
        'status' => $row['status'],
        'class_no' => $row['class_no'],
        'student_no' => $row['student_no'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name']
    );
}

header('Content-Type: application/json');
echo json_encode($attendance_data);
?>
