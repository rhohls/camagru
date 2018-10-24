<?php
require_once 'connect.php';
require_once 'gallery.php';

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

		<!-- Javascript -->
		<script type='text/javascript' src='scripts.js'></script>
	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">

			<a class="navbar-brand" href="make_picture.php">Make your own picture</a>

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
								echo "<a class='nav-link' href='loginpage.html' >Login</a>";
							?>
						</li>
						<li class="nav-item">
							<a class="nav-link" onclick='logOut();'>Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<div class="container">

			<?php getPage(); ?>
		</div>
		<!-- Footer -->
		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
			</div>
			<!-- /.container -->
		</footer>



	</body>

</html>
