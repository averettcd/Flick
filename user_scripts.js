var index = 0;
var seen = [];
var curr;

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function show_movies() {
	 document.getElementById("introduction").style.display="none";
	 document.getElementById("cards").style.display="block";
}

function hide_cards(){
	document.getElementById("cards").style.display="none";
	document.getElementById("end_of_list").style.display="block";
}

function update(like, length) {
	var num = getRndInteger(1, length);
	if (like) {
		update_likes(curr);
		match_noti(curr);
	}setTimeout(2000);
	while (seen.includes(num) && seen.length < length)
		num = getRndInteger(1, length);

	index++;
	if (index > length) {
		hide_cards();
	}
	seen.push(num);
	update_text(num);
	update_link(num);
	update_image(num);
	update_rating(num);
	update_mpa(num);
	update_summary(num);
	update_genre(num);
	curr = num;
}


function match_noti(item) {
	var xmlhttp = new XMLHttpRequest();
	var x = document.getElementById("result");
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == "1"){
				x.innerHTML = "Match!";
				x.style.display = "block";
				$('#result').delay(1200).fadeOut(300);
			}
        }
	};
	xmlhttp.open("GET", "match_noti.php?id=" + item, true);
	xmlhttp.send();

}


/*
	Update page functions
*/
function update_likes(item){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "update_likes.php?id=" + item, true);
	xmlhttp.send();
}

function update_image(item) {
	document.querySelector('#change_image').src = 'get_image.php?id='+ item;
}

function update_text(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_text").innerHTML = this.responseText;
        }
	};
	xmlhttp.open("GET", "get_text.php?id=" + item, true);
	xmlhttp.send();

}

function update_link(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_link").href = this.responseText;
			document.getElementById("change_link").target = "blank";
        }
	};
	xmlhttp.open("GET", "get_link.php?id=" + item, true);
	xmlhttp.send();
}


function update_mpa(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_mpa").innerHTML = "MPAA Rating: (" + this.responseText + ")";	
        }
	};
	xmlhttp.open("GET", "get_mpa.php?id=" + item, true);
	xmlhttp.send();
}

function update_rating(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_rating").innerHTML = "IMDB Rating: " + this.responseText + "/10";	
        }
	};
	xmlhttp.open("GET", "get_rating.php?id=" + item, true);
	xmlhttp.send();
}

function update_summary(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_summary").innerHTML = this.responseText;	
        }
	};
	xmlhttp.open("GET", "get_summary.php?id=" + item, true);
	xmlhttp.send();
}

function update_genre(item) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("change_genre").innerHTML = this.responseText;	
        }
	};
	xmlhttp.open("GET", "get_genre.php?id=" + item, true);
	xmlhttp.send();
}

function link_user(){
	var user = prompt("Enter a username to link matches with.");
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
		xmlhttp.open("GET", "link_user.php?q=" + user, true);
		xmlhttp.send();
	}
}

function show_movies() {
	 document.getElementById("introduction").style.display="none";
	 document.getElementById("cards").style.display="block";
}

function hide_cards(){
	document.getElementById("cards").style.display="none";
	document.getElementById("end_of_list").style.display="block";
}