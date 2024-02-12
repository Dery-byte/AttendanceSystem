
<?php
// Include any necessary files and establish database connection if needed

// Check if a POST request has been made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'student_id' parameter is set
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];

        // Perform database query to check if the student ID exists
            include("../admin/Database/config.php");
            global $db;

        $sql = "SELECT * FROM senate_list WHERE student_id = '$student_id'";
        $result = mysqli_query($db, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            // Student ID exists in the database
            echo "There's an account with this ID!";
        } else {
            // Student ID does not exist in the database
            echo "No account is associated with this ID";
        }

        // Close the database connection
        mysqli_close($db);
    } else {
        // Handle if 'student_id' parameter is not set
        echo "Error: Student ID  is missing.";
    }
} else {
    // Handle if the request method is not POST
    echo "Error: Only POST requests are allowed.";
}
?>

