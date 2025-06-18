<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display StyleSheet</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3>Welcome to the member's area, test!</h3>
    <center>
        <h2>
            StyleSheet --- <a href='page1.php'>[ Home ]</a>
        </h2>
        <hr>
        <h2>Data from StyleSheet table</h2>
        <br>
        <table border="0" width="50%">
            <tr bgcolor="#85e085">
                <td>Style_ID</td>
                <td>Tag</td>
                <td>Value</td>
                <td>Pick Color</td>
                <td>Update</td>
            </tr>
            <?php
            // Fetch data from tblstyle
            $sql = "SELECT styleid, tag, value FROM tblstyle";
            $result = $conn->query($sql);

            // Display data in a table format
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<form action='updateinsertcomment.php' method='post'>"; // Each row has its own form
                    echo "<td>" . $row["styleid"] . "</td>";
                    echo "<td>" . $row["tag"] . "</td>";
                    echo "<td>" . $row["value"] . "</td>";
                    echo "<td>";
                    // Editable color picker
                    echo "<input type='color' name='color' value='" . $row["value"] . "'>";
                    echo "</td>";
                    echo "<td>";
                    echo "<input type='hidden' name='styleid' value='" . $row["styleid"] . "'>";
                    echo "<input type='submit' value='Update'>";
                    echo "</td>";
                    echo "</form>"; // End of form
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>


