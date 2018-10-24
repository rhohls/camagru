function logOut(){
	var response = confirm("You are about to be logged out");
	console.log(response);
	if (response == true) {
		window.location.href = "logout.php";

	} else {
		
		window.location.href = "index.php";
	}
}
