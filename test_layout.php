<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" defer></script>
    <script src="user_scripts.js"></script>
    <link rel="stylesheet" href="master.css">
</head>
<body>
    <div class="icon">
    <a href="welcome.php">
        <img src="img/icon2.png" class="logo" alt=" ">
    </a>
    </div>
    <div class="topnav">
        <ul>
        	<li style="float:left"><a onclick="link_user()" href="javascript:void(0);">Link Users</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <li><a href="reset_password.php">Password Reset</a></li>
        </ul>
    </div>
    <div class="content">
        <img src="posters/up.jpg" style="height: 384px; width:256px; padding: 10px";/>
        <div class="content_container">
            <h4>Up</h4>
            <p>SUMMARY TEXT HERE</p>
        </div>
    </div>
</body>
</html>