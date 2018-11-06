<?php

session_start();
require_once 'connect.php';
require_once 'generic_functions.php';
require_once 'javascript/scripts.js';

if (!isset($_SESSION['uid'])){
	header('Location: login.php');
}
$uid = $_SESSION['uid'];

if (isset($_GET['img_id'])){
	$img_id = $_GET['img_id'];
} else{
$img_id = -1;
}

$query = "SELECT * FROM `images` JOIN `users` ON images.user_id=users.id WHERE img_id=:id";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $img_id]);

$image = $stmt->fetch();


$query = "SELECT * FROM `images` WHERE user_id=:id AND original=1 ORDER BY date_created DESC ";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $uid]);

$original_images = $stmt->fetchAll();


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

			<!-- if images doesnt exist -->
			<div id="items">
				
				<div id="edit_img">
					<h1> Image to edit </h1>

					put imgage and canvas absolute pos 0 0 
					

					<canvas id='edit_canvas' height="300" width="400"></canvas>
					<?php
						if ($img_id == -1)
							echo "Please select an image to edit";
						else{

							$img_loc = $image['image_location'];
							if (file_exists($img_loc)){
								echo '<img src="'.$img_loc.'" height="300" width="400"/>';
							} else {
								echo 'Error finding image';
							}
						}

					?>
				</div>

				<div id="stickers">
					<h1>Stickers</h1>
					
				</div>

				<div id="old_images">
					<h1> Old Images</h1>
					<table>
					<?php
						if (!$original_images){
							echo("No more images found for user");
						}
						else foreach($original_images as $row)
						{
							$img_loc = $row['image_location'];
							$img_id = $row['img_id'];
							if (file_exists($img_loc)){
								echo '  
									<tr>  
										<td>  
											<a href="edit.php?img_id='.$img_id.'"><img src="'.$img_loc.'" height="50" width="67"/> </a>
										</td>  
									</tr>  
								';
							}
						}
					?>
					</table>
				</div>
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


