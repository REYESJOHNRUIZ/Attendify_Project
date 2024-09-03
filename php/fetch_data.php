<?php
header('Content-Type: application/json');
require '../db_connect.php';

$category = $_GET['category'] ?? '';

switch ($category) {
    case 'Students':
        // Fetch student count per class
        $query = "SELECT class_no, COUNT(*) as student_count FROM class GROUP BY class_no";
        break;

    case 'Professors':
        // Fetch total number of professors
        $query = "SELECT COUNT(*) as total FROM professor";
        break;

    default:
        echo json_encode([]);
        exit;
}

$result = $conn->query($query);
$data = [];

if ($category === 'Students') {
    $data[] = ['Class Name', 'Student Count'];
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['class_no'], (int) $row['student_count']];
    }
} elseif ($category === 'Professors') {
    $row = $result->fetch_assoc();
    $data[] = ['Category', 'Count'];
    $data[] = ['Total Professors', (int) $row['total']];
}

echo json_encode($data);

$conn->close();
?>