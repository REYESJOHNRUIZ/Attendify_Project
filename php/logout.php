<?php
session_start();
session_unset();
session_destroy();
echo "Logged out successfully"; // Debugging line
header("Location: ../index.php"); // Adjust path if needed
exit();
?>
