<?php
session_start();

require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $special_key = trim($_POST['student_number']);
    $password = $_POST['password'];

    if (empty($special_key) || empty($password)) {
        header("Location: ../works/log_in_form.html?error=emptyfields");
        exit();
    }

    if (strpos($special_key, "20") === 0) {
        $stmt = $conn->prepare("SELECT * FROM student WHERE student_number = ?");
    } elseif (strpos($special_key, "P") === 0) {
        $stmt = $conn->prepare("SELECT * FROM professor WHERE prof_id = ?");
    } elseif (strpos($special_key, "A") === 0) {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_id = ?");
    } else {
        header("Location: ../works/log_in_form.html?error=invalidkey");
        exit();
    }

    $stmt->bind_param("s", $special_key);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Password is hashed and correct
            echo "Password is correct";
        } elseif ($password === $hashed_password) {
            // Password is not hashed, but matches the stored password
            // Now hash the password and update the database
            $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (strpos($special_key, "20") === 0) {
                $update_stmt = $conn->prepare("UPDATE student SET password = ? WHERE student_number = ?");
            } elseif (strpos($special_key, "P") === 0) {
                $update_stmt = $conn->prepare("UPDATE professor SET password = ? WHERE prof_id = ?");
            } elseif (strpos($special_key, "A") === 0) {
                $update_stmt = $conn->prepare("UPDATE admin SET password = ? WHERE admin_id = ?");
            }

            $update_stmt->bind_param("ss", $new_hashed_password, $special_key);
            $update_stmt->execute();

            echo "Password updated and is correct";
        } else {
            header("Location: ../works/log_in_form.html?error=loginfailed");
            exit();
        }

        // Set session variables and redirect as before
        if (strpos($special_key, "20") === 0) {
            $_SESSION['student_name'] = $row['firstname'] . ' ' . $row['lastname'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['section'] = 'N/A';
            $_SESSION['student_number'] = $row['student_number'];
            $_SESSION['contact_number'] = $row['phone'];
            header("Location: ../works/student_dashboard.php");
        } elseif (strpos($special_key, "P") === 0) {
            $_SESSION['prof_id'] = $row['prof_id'];
            $_SESSION['prof_name'] = $row['firstname'] . ' ' . $row['lastname'];
            header("Location: ../works/professor_dashboard.php");
        } elseif (strpos($special_key, "A") === 0) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['firstname'] . ' ' . $row['lastname'];
            header("Location: ../works/administrator_dashboard.php");
        }
        exit();
    } else {
        header("Location: ../works/log_in_form.html?error=loginfailed");
        exit();
    }
}
?>