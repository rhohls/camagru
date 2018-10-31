<?php
require_once 'connect.php';

session_start();
?>



<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Thumbnail Gallery - Start Bootstrap Template</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/thumbnail-gallery.css" rel="stylesheet">

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">

			<a class="navbar-brand" href="reg.html">Start Bootstrap working</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">?</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">?</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="reg.html">Register</a>
						</li>
						<li class="nav-item">
							<?php
							if (isset($_SESSION['uid'])){
								echo "<a class='nav-link' href='#'>My Account</a>";
							}
							else
								echo "<a class='nav-link' href='loginpage.html'>Login</a>";
							?>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<script>
		function sendData() {
			console.log("function call");
			
			var XHR = new XMLHttpRequest();
			var canvas = document.getElementById('canvas');
			var img_data = canvas.toDataURL("image/png");

			XHR.addEventListener('load', function(event) {
				if (this.response)
					alert(this.response);
				else
					alert("Uploaded");
			});
			XHR.addEventListener('error', function(event) {
			alert('Oops! Something went wrong.');
			});
			XHR.open('POST', 'save_pic.php');
			XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			XHR.send("img=" + img_data);
		}
		</script>
		<!-- Page Content -->
		<div class="container">

			<h1 class="my-4 text-center text-lg-left">Video is here</h1>

			<video autoplay=true id='video_player' height='300' width='400'></video>
			

			<h2> No more vids</h2>
			<a href='#' id="capture" class="pic_btn">Take picture </a>
			
			<input type="button" onclick="sendData()" value="Save pic">


			<canvas id='canvas' height="300" width="400"></canvas>
		</div>
		<script src='javascript/photo.js'></script>

		<!-- /.container -->

		<!-- Footer -->
		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
			</div>
			<!-- /.container -->
		</footer>



	</body>

</html>
