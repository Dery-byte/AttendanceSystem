<?php
// Start the session
//session_start();
// Check if the user is authenticated
if (!isset($_SESSION['student_id'])) {
    // User is not authenticated, redirect to login page
    header("Location: ../login/index.php");
    exit;
}
?>
