<?php 
	session_start();
	require_once "config.php";
	$id = $_GET['id'];

	$my_username = $_SESSION['username'];
    $link_user_sql = "SELECT `linked_user` FROM `users` where `username`=\"$my_username\"";
    $result = mysqli_query($link, $link_user_sql);
   	$row = mysqli_fetch_row($result);
    $linked_user = $row[0];

    $liked_match = "SELECT 1 FROM `likes` where `username`=\"$linked_user\" and `movieID`=$id";
    $result = mysqli_query($link, $liked_match);
	if(mysqli_num_rows($result) > 0)
		echo "1";
	else
		echo "0";

?>