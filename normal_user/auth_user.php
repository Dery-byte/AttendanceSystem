<?php
// Start the session
//session_start();
// Check if the user is authenticated
if (!isset($_SESSION['student_id'])) {
    // User is not authenticated, redirect to login page
    header("Location: ../login/index.php");
    exit;
}



//// Check if the user is already logged in
//if (isset($_SESSION['student_id']) && $_SESSION['student_id'] === true) {
//    header('Location: dashboard.php'); // Redirect to dashboard or any other page
//    exit();
//}
?>
