<html>
	<?php
	// $dir = 'php_functions';
	// foreach (scandir(dirname($dir)) as $filename) {
	// 	$path = dirname($dir) . '/' . $filename;
	// 	if (is_file($path)) {
	// 		require $path;
	// 	}
	// }
	require_once './php_functions/sidebar.php';
	require_once './php_functions/username.php';
	require_once './php_functions/getpage.php';
	require_once './php_functions/logout.php';
	require_once './php_functions/addtocart.php';
	session_start();
	?>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Ye Olde Shoppe</title>
</head>
<body>
	<div class="main_wrapper">

		<!-- Header --><?php require_once('header.php'); ?>
		<div class="content_wrapper">
			<!-- Sidebar --><?php require_once('sidebar.php'); ?> 
			
			
			<!-- Main content -->
			<div id="products">
				<?php getPage() ?>
			</div>
			<!-- End main contents -->
			
		</div>
		<!-- <br> -->
		<!-- <div id="footer">
			this is the footer
		</div> -->
	</div>
</body>
</html>

