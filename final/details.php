<html>
<head>
	<title> New Site - Details</title>
	<link rel="stylesheet" href="style/style.css">
	<style>
	img
	{
	float: left;
	margin-right: 15px;
	margin-bottom: 15px;
	}
	</style>
</head>

<body>
	<header class="banner">
	<img src="images/logo.png">  

	<div class="panel panel-nav">
		<center>
			<ul>
			<li> <a href="index.php"> Home </a> </li>
			<li> <a href=""> Archive </a> </li>
			<li> <a href=""> Contact Us </a> </li>
			<li> <a href=""> Login </a> </li>
			<li>  <div class="search">
							<Form action="search.php">
							<input type="text" name="search" size="20" height="24">
							<input type="image" src="images/search.png" alt="Submit" width="24" height="24">
							</Form>
							</div>	 
			</li>
			</ul>
		</center>
	</div>
	</header>
	
	
	
	<main>
	
	<?php


require 'dbcon.php';
//echo "Connected successfully";

$id = "";

$id = $_GET['id'];

$sql = "SELECT * from tblnews LEFT JOIN tblcategory ON tblnews.newscatid = tblcategory.catid where newsid=".$id."";
// SELECT * FROM table1 LEFT JOIN table2 ON table1.id=table2.id;
$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) 
	{
		
//echo $row["id"]." ".$row["firstname"]." ".$row["lastname"]." ".$row["email"]. " - <a href=del.php?nid=".$row["id"]."> Del </a>    - <a href=update.php?nid=".$row["id"]."> Update </a> ". "<BR>";
	echo 	"
			<section>	
				<article>
					<img width=250px src=images/".$row["newsimage"]." />
					<BR>
					<h2> ".$row["newsheadline"]." </h2>
					<p> ".$row["newsdetails"]." </p>
					<p><br></p>
					<p> Author: ".$row["newsautor"]." Date: ".$row["newsdate"]."  Category: ".$row["catname"]." </p>
				</article>
			</section>";
	}
	
$conn->close();

	?>
	<section>
		<article>
			<h3>User Comment:</h3>
			<br><br>
			<form action="insertcomment.php" method="post">
				<input type="hidden" name="nid" value="65">
				<textarea name="comment" rows="2" cols="50"></textarea>
				<input type="submit" value="Add Comment">
			</form>
		</article>
	</section>
	</main>
	
	<footer>
		<center>
			Footer information
		</center>
	</footer>
</body>
</html>