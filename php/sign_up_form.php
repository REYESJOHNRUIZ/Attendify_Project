<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize input
  $firstname = trim($_POST['firstname']);
  $middlename = trim($_POST['middlename']);
  $lastname = trim($_POST['lastname']);
  $birthday = $_POST['birthday'];
  $student_number = trim($_POST['student_number']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  // Check if passwords match
  if ($password !== $confirmPassword) {
    echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
    exit;
  }

  // Check if email already exists
  $stmt = $conn->prepare("SELECT email FROM student WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "<script>alert('Email already exists.'); window.history.back();</script>";
    exit;
  }

  // Check if student number already exists
  $stmt = $conn->prepare("SELECT student_number FROM student WHERE student_number = ?");
  $stmt->bind_param("s", $student_number);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "<script>alert('Student number already has an account.'); window.history.back();</script>";
    exit;
  }

  // Insert student into the database
  $stmt = $conn->prepare("INSERT INTO student (firstname, middlename, lastname, birthday, email, password, student_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $birthday, $email, $password, $student_number);

  // Execute the query and check for success
  if ($stmt->execute()) {
    echo "<script>alert('Sign up successful. Redirecting to login...'); window.location.href = '../works/log_in_form.html';</script>";
  } else {
    echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
  }

  // Close connections
  $stmt->close();
  $conn->close();
}
?>