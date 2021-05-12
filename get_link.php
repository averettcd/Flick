<?php 
	require_once "config.php";
	$id = $_GET['id'];

	$sql = "SELECT `link` FROM `movies` WHERE `movieID` = \"$id\"";
	$result = mysqli_query($link,$sql);
  	$row = mysqli_fetch_assoc($result);
  	if(mysqli_num_rows($result) > 0)
  		echo $row['link'];

?>