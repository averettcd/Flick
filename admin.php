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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <script src="admin_scripts.js"></script>
    <script src="jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="master.css">
    <style type="text/css">
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        th {
            padding: 10px;
        }
        tr:nth-child(even) {
            width:100%;
            background-color: #f0f0f0;
        }
        td {
            padding:5px;
        }
    </style>
</head>
<body>
    <div class="icon">
        <img src="img/icon2.png" class="logo" alt=" ">
    </div>
<div class="topnav">
        <ul>
            <li style="float:left"><a href="index.php">Home</a></li>
            <li style="float:left"><a id="toggle_users" onclick="toggle_users()" href="javascript:void(0);">Show Users</a></li>
            <li style="float:left"><a onclick="confirm_remove()" href="javascript:void(0);">Remove Users</a></li>
            <li style="float:left"><a onclick="confirm_clear_likes()" href="javascript:void(0);">Clear Likes</a></li>
        </ul>
    </div>
    <div id="users">
        <?php
            $users_sql = "SELECT username, created_at from users where admin = 0";
            $user_result = $link->query($users_sql);
            print "
            <table style=\"display:none;\" id=\"show_users\">
            <tr>
            <th>Username</th>
            <th>Created On</th>
            </tr>
            ";
            while ($d = $user_result->fetch_assoc()) {
                $user = $d['username'];
                $date = $d['created_at'];
                print "
                <tr>
                <td>$user</td>
                <td>$date</td>
                </tr>
                ";
            }
            print "</table>";
            $link->close();
        ?>
    </div>
    <div>
        <p id="result"></p>
    </div>
</body>
</html>