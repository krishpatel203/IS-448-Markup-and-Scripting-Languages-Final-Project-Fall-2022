<?php
// Include the database connection
include 'dbcon.php';

echo "<Center>";
echo "<BR>";
Echo "<H2><BR><BR><BR>
<a href= > Comment Show/Hide        ---     <A Href=page1.php> [ Home ] </A></a></H2>";
echo "<BR>";
echo "<BR>";
echo "<HR>";

// Optionally display client IP
$display_ip = true; // Set to false if you don't want to display client IP

// Handle delete request
if (isset($_GET['delete'])) {
    $commentid = intval($_GET['delete']);
    $sql = "DELETE FROM tblcomment WHERE commentid = $commentid";
    if ($conn->query($sql) === TRUE) {
        echo "Comment deleted successfully.";
    } else {
        echo "Error deleting comment: " . $conn->error;
    }
}

// Handle show/hide request
if (isset($_GET['toggle'])) {
    $commentid = intval($_GET['toggle']);
    $sql = "UPDATE tblcomment SET showhide = 1 - showhide WHERE commentid = $commentid";
    if ($conn->query($sql) === TRUE) {
        echo "Comment visibility updated successfully.";
    } else {
        echo "Error updating visibility: " . $conn->error;
    }
}

// Fetch comments
$sql = "SELECT commentid, comment, newsid, showhide FROM tblcomment";
$result = $conn->query($sql);

$comments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

// Display comments
echo "<table border='1'>";
echo "<tr>
        <th>Comment_ID</th>
        <th>Comment</th>
        <th>NewsID</th>
        <th>Show / Hide</th>
        <th>Delete</th>";
if ($display_ip) { echo "<th>Client IP</th>"; }
echo "</tr>";

foreach ($comments as $comment) {
    $showHideText = $comment['showhide'] ? 'Hide' : 'Show';
    echo "<tr>
            <td>{$comment['commentid']}</td>
            <td>" . htmlspecialchars($comment['comment']) . "</td>
            <td>{$comment['newsid']}</td>
            <td><a href='?toggle={$comment['commentid']}'>{$showHideText}</a></td>
            <td><a href='?delete={$comment['commentid']}'><img src='delete_icon.png' alt='Delete'></a></td>";
    if ($display_ip) { echo "<td>{$_SERVER['REMOTE_ADDR']}</td>"; }
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>

