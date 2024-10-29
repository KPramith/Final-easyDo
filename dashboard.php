<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Display the user name or other user details
echo "Welcome, " . $_SESSION['user_name'];
?>
