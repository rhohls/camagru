<?php
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title>Camagru</title>
</head>
<body>
	<div class="main_wrapper">

		<!-- Header --><?php require_once('header.php'); ?>
		<div class="content_wrapper">
			<!-- Sidebar --><?php require_once('sidebar.php'); ?>


			<!-- Main content -->
			<div id="products">
				<?php var_dump($_SESSION) ?>
			</div>
			<!-- End main contents -->
			
		</div>
		<!-- <br> -->
		<!-- Sidebar --><?php require_once('footer.php'); ?>
	</div>
</body>
</html>

