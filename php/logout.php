<?php
session_start();
session_unset();
session_destroy();
echo "Logged out successfully"; // Debugging line
header("Location: ../works/log_in_form.php"); // Adjust path if needed
exit();
?>
