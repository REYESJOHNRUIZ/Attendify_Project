<?php
header('Content-Type: application/json');
require '../db_connect.php';

$category = $_GET['category'] ?? '';
$type = $_GET['type'] ?? '';

if ($type === 'chart') {
    switch ($category) {
        case 'Students':
            // Fetch student count per class
            $query = "SELECT class_name, COUNT(*) as student_count FROM student GROUP BY class_name";
            break;

        case 'Professors':
            // Fetch total number of professors
            $query = "SELECT COUNT(*) as total FROM professor";
            break;

        default:
            echo json_encode(['error' => 'Invalid category']);
            exit;
    }

    $result = $conn->query($query);
    if (!$result) {
        echo json_encode(['error' => $conn->error]);
        exit;
    }

    $data = [];

    if ($category === 'Students') {
        $data[] = ['Class Name', 'Student Count'];
        while ($row = $result->fetch_assoc()) {
            $data[] = [$row['class_name'], (int) $row['student_count']];
        }
    } elseif ($category === 'Professors') {
        $row = $result->fetch_assoc();
        $data[] = ['Category', 'Count'];
        $data[] = ['Total Professors', (int) $row['total']];
    }

    echo json_encode($data);
} elseif ($type === 'list') {
    // Your existing list fetching code
}

$conn->close();
?>
