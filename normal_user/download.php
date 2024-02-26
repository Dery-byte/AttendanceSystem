<!--================================NEW ADDITION======================================-->
<?php
include("../admin/controller.php");
if (isset($_GET['filename'])) {
   $file_id = $_GET['filename'];

   $sql2 = "SELECT * FROM sched_minutes, senate_sched WHERE senate_sched.sched_id = sched_minutes.schedule_id AND sched_minutes.file = '$file_id'";

   $results = mysqli_query($db, $sql2);
if (mysqli_num_rows($results) == 1) {
    $row = mysqli_fetch_assoc($results);
    // Retrieve the file path
    $file_path = "../admin/minutesFiles/" . $row['file'];
    $filename = $row['file'];
    $folder_path = "../admin/minutesFiles/";
    $file_path = $folder_path . $filename;
    // Check if the file exists
    if (file_exists($file_path)) {
        // Set headers for file download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        // Output the file for download
        readfile($file_path);
        exit;
    } else {
        echo "File not found: " . $filename . "<br>";
    }
}

}
?>
