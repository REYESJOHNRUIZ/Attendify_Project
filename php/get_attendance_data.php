<?php
session_start();
require '../db_connect.php';

if (!isset($_SESSION['prof_id'])) {
    header("Location: ../works/log_in_form.html?error=notloggedin");
    exit();
}

$class_no = $_GET['class_no'];
$date = $_GET['date'];

$stmt = $conn->prepare("
    SELECT s.student_number, s.firstname AS first_name, s.lastname AS last_name, a.status, a.date
    FROM class c
    INNER JOIN student s ON c.student_no = s.student_number
    LEFT JOIN attendance a ON a.student_no = c.student_no AND a.class_no = c.class_no AND a.date = ?
    WHERE c.class_no = ?
");
$stmt->bind_param("ss", $date, $class_no);
$stmt->execute();
$result = $stmt->get_result();

$attendance_data = [];

while ($row = $result->fetch_assoc()) {
    $attendance_data[] = array(
        'student_no' => $row['student_number'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'status' => $row['status'],
        'date' => $row['date']
    );
}

header('Content-Type: application/json');
echo json_encode($attendance_data);
?>
