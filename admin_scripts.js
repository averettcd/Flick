// Author: Chase Averett
//

// Toggle displaying of users in database.
function toggle_users(){
	var x = document.getElementById("show_users");
  	if (x.style.display === "none") {
  		document.getElementById("toggle_users").innerHTML="Hide Users";
    	x.style.display = "block"; 
  	}
  	else {
  		document.getElementById("toggle_users").innerHTML="Show Users";
    	x.style.display = "none";
    }

}

// Admin types to confirm user removal.
function confirm_remove(){
	var user = prompt("Please enter the user to be removed.\n\nWARNING: This cannot be undone.");
	document.getElementById("result").innerHTML = "";
	$('#result').show();
	if (user != null){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("result").innerHTML = this.responseText;
				$('#result').delay(3200).fadeOut(300);
            }
		};
		xmlhttp.open("GET", "remove_user.php?q=" + user, true);
		xmlhttp.send();
	}
}

// Confirm if admin wants to clear all likes from database.
function confirm_clear_likes(){
	document.getElementById("result").innerHTML = "";
	$('#result').show();
	if(confirm("You are about to remove all user likes. Confirm?\n\nWARNING: This cannot be undone.")){
		if(confirm("This is going to remove all user's likes.")){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("result").innerHTML = this.responseText;
					$('#result').delay(3200).fadeOut(300);
            		}
			};
			xmlhttp.open("GET", "remove_likes.php", true);
			xmlhttp.send();
		}
		else {
			exit();
		}
	}
	else {
		exit();
	}
}