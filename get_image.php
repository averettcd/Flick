<?php
require_once "config.php";


	$id = $_GET['id'];
  	// do some validation here to ensure id is safe
  	$sql = "SELECT `poster` FROM `movies` WHERE `movieID` = \"$id\"";
  	$result = mysqli_query($link,$sql);
  	if(mysqli_num_rows($result) > 0) {
  		$row = mysqli_fetch_assoc($result);
  		header("Content-type: image/jpeg");
  		echo $row['poster'];
  		$link->close();
  	}

?>