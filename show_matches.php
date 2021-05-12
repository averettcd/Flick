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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <style type="text/css">

        html {
            background-image: url("img/movies_white.jpg");
        }
    </style>
    <?php
        error_reporting(E_ALL ^ E_WARNING); 
        $my_username = $_SESSION['username'];
        $link_user_sql = "SELECT `linked_user` FROM `users` where `username`=\"$my_username\"";
        $result = mysqli_query($link, $link_user_sql);
        $row = mysqli_fetch_row($result);
        $linked_user = $row[0];
        $users_sql = "SELECT * FROM movies WHERE movieID in (SELECT DISTINCT a.movieID FROM (SELECT movieID FROM likes WHERE username=\"$my_username\")as a INNER JOIN (SELECT movieID FROM likes WHERE username=\"$linked_user\") as b on a.movieID = b.movieID)";
        $user_result = $link->query($users_sql);
        $count = $user_result->num_rows;
    ?>
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
    <div class="show_link">
        <?php 
            if ($linked_user == null)
                echo "<h1>Uh Oh, you haven't linked with anyone yet.</h1>";
            else
                echo "<h1>$count movies with $linked_user</h1>";
            ?>
    </div>
    <div class="matched_cards">
        <?php
            while ($d = $user_result->fetch_assoc()) {
                $title = $d['title'];
                $rating = $d['rating'];
                $movieID = $d['movieID'];
                $link = $d['link'];
                $summary = $d['summary'];
                $genre = $d['genre'];
                $MPA = $d['MPA_rating'];
                $search = $string = preg_replace('/\s+/', '+', $title . " Movie Streaming");

                print"
                <div class=\"matched_card\">
                    <div class=\"matched_card__left\">
                        <img class=\"matched_card__img\"src=\"get_image.php?id=$movieID\"/>
                    </div>
                    <div class=\"matched_card__right\">
                        <h1 class=\"matched_card__title\">$title<br><i class=\"fas fa-star\" style=\"color: #7b28bf\"></i>($rating/10) ($MPA)<br>$genre</h1>
                        <p class=\"matched_card__summary\">
                            $summary
                        </p>
                        <a href=$link title=\"IMDB\" target='_blank'>Read more</a>
                        <a href=https://www.google.com/search?q=$search title=\"Search\" target='_blank'>Streaming Availability</a>
                    </div>
                </div>
            ";
            }
        ?>
    </div>
</body>
</html>