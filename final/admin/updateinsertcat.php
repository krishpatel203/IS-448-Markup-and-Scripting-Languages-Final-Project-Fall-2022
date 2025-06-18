<?php
include 'member.php';
// Show MyGuests Data

require 'dbcon.php';

// define variables and set to empty values
$catname = "";
$id = "";
$id = $_POST['id'];
$catname = $_POST['cn'];
echo $id;
echo "<BR>";
echo $catname;

$sql = "update tblcategory set catname='$catname' Where catid=$id";
$conn->query($sql);

$conn->close();


header('Location: displaycat.php');

?>