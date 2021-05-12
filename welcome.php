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
    <script src="user_scripts.js" defer></script>
    <script src="jquery-3.6.0.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins">
    <style type="text/css">
        html {
            height: 100%;
            background-image: url("img/movies_white.jpg");
        }
    </style>
</head>
<body>
<?php
    $sql = "SELECT `movieID`,`title`,`link`,`rating` FROM `movies`";
    $results = mysqli_query($link, $sql);
    $dbarry = mysqli_fetch_array($results);
    $movie = $dbarry[0];
    $length = $results->num_rows;
?>
    <div class="icon">
    <a href="welcome.php">
        <img src="img/icon2.png" class="logo" alt=" ">
    </a>
    </div>
    <div class="topnav">
        <ul>
        	<li style="float:left"><a onclick="link_user()" href="javascript:void(0);">User Link <i class="fas fa-link"></i></a></li>
            <li style=float:left><a href=show_matches.php>Show Matches</a></li>
        	<?php
                switch ($_SESSION['usertype']) {
        			case 1:
        				echo("<li style=\"float:left\"><a href=\"admin.php\">Admin</a></li>");
        				break;
        			default:
        				break;
        		}
        	?>
            <li><a href="logout.php">Sign Out  <i class="fas fa-sign-out-alt"></i></a></li>
            <li><a href="reset_password.php">Password Reset</a></li>
        </ul>
    </div>
    <div class="welcome" id="introduction">
        <h1>Welcome to Flick!</h1>
        <hr>
        <h2>What is Flick?</h2>
        <p>Flick is a movie matching service designed to help you and your friends decide on movies.</p>
        <h2>How do I use Flick</h2>
        <p>You will be presented with a movie card. Each movie card has:</p>
        <ul>
            <li>A movie poster</li>
            <li>Hovering over the movie's poster will give you key information about the movie</li>
            <li>Clicking on a movie's image will take you to its IMDB page</li>
            <li>Buttons to make a like or skip</li>
        </ul>
        <p>You also have the option to link to another user in our system.</p>
        <p>Click on the "Link User" button on the top of the page.</p>
        <p>Once you've made a selection of movies click the "Show Matches" option to see which movies you both prefer.</p>
        <p>From here you will see all available information about the films</p>
        <p>Click here to start selecting movies.</p>
        <button type=button onclick=show_movies()>Get Started</button>
    </div>
    <div class="container" id="cards" style="display: none;">
        <div class="movie_card">
        <div class="image">
            <a href=javascript:void(0); id="change_link">
            <img src="img/flick_start.jpg" class="image__img" id="change_image"/>
            <div class="image__overlay image__overlay--primary">
                <h2 id="change_genre"></h2>
                <div class="image__title" id="summary_title"></div>
                <p class="image__description" id="change_summary"></p>
				<h2 id="change_rating"></h2>
				<h2 id="change_mpa"></h2>
            </div></a>
        </div>
            <h2 id="change_text">Click either button to start</h2>

            <div class="buttons">
                <?php
                    print "
                        <button type=button onclick=update(true,$length)><i class=\"fas fa-thumbs-up\"></i>
                        </button><button type=button onclick=update(false,$length)><i class=\"fas fa-thumbs-down\"></i></button>
                    ";
                ?>
            </div>
        </div>
    </div>
    <div class="match_made">
        <h2 id="result"></h2>
    </div>
    <div class="status" id="end_of_list" style="display: none;">
        <p>You've finished our list! Click <a href="show_matches.php">here</a> to show your matches.</p>
    </div>
</body>
</html>