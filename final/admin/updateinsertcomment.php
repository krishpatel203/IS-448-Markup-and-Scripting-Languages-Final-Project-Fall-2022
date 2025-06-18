<?php
include 'dbcon.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $styleid = $_POST['styleid'];
    $newColor = $_POST['color'];

    // Update the color value in the database
    $sql = "UPDATE tblstyle SET value = '$newColor' WHERE styleid = $styleid";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    // Redirect back to the stylesheet page
    header("Location: updatestyle.php");
}
?>

