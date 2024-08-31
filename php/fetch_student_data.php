<?php
header('Content-Type: application/json');
require '../db_connect.php';

// Query to fetch student details
$query = 'SELECT lastname, firstname, email, phone, gender, age FROM student';
$result = $mysqli->query($query);

$students = []; // This array will store the fetched student records

// Check if there are any records returned by the query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row; // Add each student record to the array
    }
}

// Output the array as JSON
echo json_encode($students);

$mysqli->close();
?>