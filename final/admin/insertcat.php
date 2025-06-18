<?php
include 'member.php';
// Show MyGuests Data

require 'dbcon.php';

// define variables and set to empty values
$catname = "";

$catname = $_POST['cn'];

  $sql = "INSERT INTO tblcategory (catname) VALUES ('$catname')";
  
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: displaycat.php');
?>