<?php
require '../db_connect.php';

// Get form data
$firstname = $_POST['first_name'];
$middlename = $_POST['middle_name'];
$lastname = $_POST['last_name'];
$birthday = $_POST['birthdate'];
$email = $_POST['email'];
$status = $_POST['status'];
$course = $_POST['course'];
$password = $_POST['password'];

// Debug line to check password (remove after testing)
// echo "Password: " . $password;

// Generate prof_id
$sql = "SELECT MAX(id) as max_id FROM professor";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$last_id = $row['max_id'];
$new_id = sprintf("P%05d", ($last_id ? $last_id + 1 : 1));

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database using prepared statement
$stmt = $conn->prepare("INSERT INTO professor (firstname, middlename, lastname, birthday, email, course, status, password, prof_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $firstname, $middlename, $lastname, $birthday, $email, $course, $status, $hashed_password, $new_id);

if ($stmt->execute()) {
    echo "<script>
            alert('Sign up successfully. Click OK to go back to admin.');
            window.location.href = '../works/administator_dashboard.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>