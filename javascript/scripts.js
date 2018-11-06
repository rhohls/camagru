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

function replaceImage(src){
	var context = document.getElementById('edit_canvas').getContext("2d");
		
	var img = new Image();
	img.onload = function () {
		context.drawImage(img, 0, 0, 400, 300);
	}
	img.src = src;
}