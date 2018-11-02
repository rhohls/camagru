<?php
session_start();
if (!isset($_SESSION['uid'])){
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Camagru</title>
</head>
<body>
	<div class="main_wrapper">
		<!-- Header --><?php require_once('header.php'); ?>
		<div class="content_wrapper">
			

			<!-- Main content -->
			<div id="items">
				<div>
					<h1>Video is here</h1>
						<video autoplay=true id='video_player' height='300' width='400'></video>
					<h2> Cap image is here</h2>
						<canvas id='canvas' height="300" width="400"></canvas>
					<div id="photo_buttons">
						<a href='#' id="capture" class="pic_btn">Take picture </a>
						<input type="button" onclick="sendData();" value="Save pic">	
					</div>
				</div>
				<script src='javascript/photo.js'></script>
			</div>
			<!-- End main contents -->


		<!-- Sidebar --><?php require_once('sidebar.php'); ?>
		</div>
		<!-- <br> -->
		<!-- footer -->
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>

