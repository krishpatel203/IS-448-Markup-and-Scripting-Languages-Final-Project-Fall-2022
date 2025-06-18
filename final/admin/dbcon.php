<?php
// Connection

$servername = "studentdb-maria.gl.umbc.edu";
$username = "kpatel38";
$password = "kpatel38";
$dbname = "kpatel38";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>