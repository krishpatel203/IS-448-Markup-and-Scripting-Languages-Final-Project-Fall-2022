<?php
require 'dbcon.php';
$nid = $_POST['nid']; 
$comment = $_POST['comment'];
if($comment != "") {
	$sql = "INSERT INTO tblcomment (comment, newsid, showhide) VALUES ('$comment', '$nid', 1)";
	if ($conn->query($sql) === TRUE) {
		echo "New comment added successfully";
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>