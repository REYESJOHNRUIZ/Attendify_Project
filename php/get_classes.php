<?php
// get_classes.php
require '../db_connect.php';

if (!isset($_GET['course_code'])) {
    echo json_encode(['error' => 'Course code not provided']);
    exit;
}

$course_code = $_GET['course_code'];

$stmt = $conn->prepare("
    SELECT DISTINCT c.class_no 
    FROM class c 
    JOIN courses co ON c.courses_id = co.courses_id 
    WHERE co.course_code = ?
");
$stmt->bind_param("s", $course_code);
$stmt->execute();
$result = $stmt->get_result();

$classes = [];
while ($row = $result->fetch_assoc()) {
    $classes[] = $row;
}

echo json_encode($classes);
?>
