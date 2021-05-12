<?php 
	session_start();
	if (!isset($_SESSION["loggedin"])) {
		header("location: index.php");
		exit;
	}
	if(isset($_SESSION["loggedin"])  && $_SESSION["loggedin"] === true && $_SESSION["usertype"] != 1){
		header("location: welcome.php");
		exit;
	}
	require_once"config.php";

	mysqli_query($link, "DELETE FROM `likes` WHERE 1");
	echo " Likes table cleared.";
	$link->close();
?>