<?php

// Optional: Session check if needed for security
if (!isset($_SESSION['admin_id'])) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}
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
            echo json_encode([]);
            exit;
    }

    $result = $conn->query($query);
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