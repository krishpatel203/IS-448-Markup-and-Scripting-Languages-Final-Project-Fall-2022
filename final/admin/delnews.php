<?php
include 'member.php';
require 'dbcon.php';

if (isset($_GET['nid'])) {
    $newsid = $_GET['nid'];

    // SQL to delete a record
    $sql = "DELETE FROM tblnews WHERE newsid = $newsid";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header("Location: displaynews.php");
} else {
    echo "No news ID provided.";
}
?>
