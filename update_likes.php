<?php 
	session_start();
	require_once "config.php";

	$my_user = $_SESSION['username'];
	$id = $_GET['id'];

	$in_movies = "SELECT `title` FROM `movies` WHERE `movieID`=$id";
	$check1 = mysqli_query($link,$in_movies);
	if (mysqli_num_rows($check1) > 0) {
		$in_likes = "SELECT `movieID` FROM `likes` WHERE `movieID`=$id AND `username`='$my_user'"; 
		$check2 = mysqli_query($link, $in_likes);
		if (mysqli_num_rows($check2) == 0) {
			$insert = "INSERT INTO `likes` (`username`, `movieID`) VALUES ('$my_user', '$id')";
			mysqli_query($link, $insert);
			echo "success";
			$link->close();
		}
	}
	else
	$link->close();
?>