function logOut(){
	var response = confirm("You are about to be logged out");
	if (response == true) {
		console.log("logout")
		window.location.replace("logout.php");
	} else {
		window.location.href = "index.php";
	}
}


// function adjustAccountInfo(){
// 	var response = confirm("You are about to adjust the following the entered information");
// 	if (response == true) {
// 		window.location.href = "adjust.php";
// 	}
// 	return (response);
// }
