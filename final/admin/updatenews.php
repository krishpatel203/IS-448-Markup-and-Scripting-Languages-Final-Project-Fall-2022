<head><title> Update NEWS </title> 
<link rel=stylesheet href=css/style.css> 
</head>

<?php
include 'member.php';
require 'dbcon.php';

if(isset($_GET['nid'])) {
    $newsid = $_GET['nid'];
    $sql = "SELECT * from tblnews WHERE newsid = $newsid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newsheadline = $row['newsheadline'];
        $newscatid = $row['newscatid'];
        $newsautor = $row['newsautor']; // Use 'newsautor' as per table definition
        $newsdate = $row['newsdate'];
        $newsimage = $row['newsimage'];
        $newsdetails = $row['newsdetails'];
    } else {
        echo "No news found with the given ID.";
        exit;
    }
}

if(isset($_POST['update'])) {
    $newsheadline = $_POST['newsheadline'];
    $newscatid = $_POST['newscatid'];
    $newsautor = $_POST['newsautor']; // Use 'newsautor' as per table definition
    $newsdate = $_POST['newsdate'];
    $newsdetails = $_POST['newsdetails'];

    // Handle file upload
    if ($_FILES['newsimage']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["newsimage"]["name"]);
        move_uploaded_file($_FILES["newsimage"]["tmp_name"], $target_file);
        $newsimage = $target_file;
    } else {
        $newsimage = $_POST['existing_image'];
    }

    $sql = "UPDATE tblnews SET newsheadline='$newsheadline', newscatid='$newscatid', newsautor='$newsautor', newsdate='$newsdate', newsimage='$newsimage', newsdetails='$newsdetails' WHERE newsid=$newsid";

    if ($conn->query($sql) === TRUE) {
        echo "News updated successfully";
        header("Location: displaynews.php");
    } else {
        echo "Error updating news: " . $conn->error;
    }
}

$conn->close();
?>

<Center>
<BR>
<H2>Update News</H2>
<BR>
<HR>
<BR>
<form method="post" action="" enctype="multipart/form-data">
    <label for="newscatid">Category:</label><br>
    <input type="text" id="newscatid" name="newscatid" value="<?php echo $newscatid; ?>"><br><br>
    
    <label for="newsheadline">Headline:</label><br>
    <input type="text" id="newsheadline" name="newsheadline" value="<?php echo $newsheadline; ?>"><br><br>
    
    <label for="newsautor">Author:</label><br>
    <input type="text" id="newsautor" name="newsautor" value="<?php echo $newsautor; ?>"><br><br>
    
    <label for="newsdate">Date (yyyy/mm/dd):</label><br>
    <input type="text" id="newsdate" name="newsdate" value="<?php echo $newsdate; ?>"><br><br>
    
    <label for="newsimage">Image:</label><br>
    <input type="file" id="newsimage" name="newsimage"><br>
    <input type="hidden" name="existing_image" value="<?php echo $newsimage; ?>">
    <?php if ($newsimage): ?>
        <img src="<?php echo $newsimage; ?>" alt="Current Image" width="100"><br><br>
    <?php endif; ?>

    <label for="newsdetails">Details:</label><br>
    <textarea id="newsdetails" name="newsdetails"><?php echo $newsdetails; ?></textarea><br><br>
    
    <input type="submit" name="update" value="Update">
</form>
</Center>
