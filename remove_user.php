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
	require_once "config.php";
	$user = $_REQUEST["q"];
	$result = mysqli_query($link, "SELECT `username` FROM `users` WHERE `username`=\"$user\" AND `admin` = 0");
	if(mysqli_num_rows($result) > 0) {
		mysqli_query($link, "DELETE FROM `users` WHERE `username`=\"$user\" AND `admin` = 0");
		echo "Success.";
	}
	else
		echo "No such user.";

	$link->close();
?>