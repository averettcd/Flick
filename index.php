<?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Flick</title>
    <link rel="stylesheet" href="master.css">
    <style type="text/css">
        html {
            height: 100%;
            background-image: url("img/movies.jpg");
        }
    </style>
</head>
<body>
    <div class="icon" style="height:250px;">
        <img src="img/icon2.png" alt=" "style="display: block; width:500px; height: 100%; margin-right: auto; margin-left: auto;">
    </div>
    <div class="topnav">
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li style="float:left"><a href="index.php">Home</a></li>
        </ul>
    </div>
</body>
