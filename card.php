<?php 
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matches</title>
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
    </ul>
</div>
<div class="scene">
    <div class="card">
        <div class="card__face card__face--front">front</div>
        <div class="card__face card__face--back">back</div>
    </div>
</div>
   <script>
        var card = document.querySelector('.card');
        card.addEventListener( 'click', function() {
            card.classList.toggle('is-flipped');
        });
    </script>
</body>
</html>