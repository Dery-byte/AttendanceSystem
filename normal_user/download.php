<?php
include("../admin/controller.php");

// Fetch PDF from the database
$sql = "SELECT * FROM sched_minutes, senate_sched where senate_sched.sched_id = sched_minutes.schedule_id;";
$result = mysqli_query($db, $sql);
//$row = mysqli_fetch_array($result);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pdfContent = $row["file"];

    // Set headers for PDF download
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="downloaded_pdf.pdf"');

    // Output PDF content
    echo $pdfContent;
} else {
    echo "PDF not found in the database.";
}

?>
