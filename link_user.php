<?php 
	// Carry over SESSION variables
	session_start();
	require_once "config.php";

	$my_username = $_SESSION['username'];
	$user = $_REQUEST["q"];
	if ($user == $my_username) {
		echo "You cannot link with yourself.";
		exit();
	}
	$result = mysqli_query($link, "SELECT `username` FROM `users` WHERE `username`=\"$user\" AND `username`<> \"$my_username\"");
	if(mysqli_num_rows($result) > 0) {
		if (mysqli_query($link, "UPDATE `users` SET `linked_user`=\"$user\" WHERE `username`=\"$my_username\""));
			echo "Success.";
	}
	
	else
		echo "No such user. Try again.";

	$link->close();

?>