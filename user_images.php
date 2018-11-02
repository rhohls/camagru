<?php

session_start();
require_once 'connect.php';
require_once 'generic_functions.php';

// if (isset($_SESSION['uid']) && ){

// }
// else
// 	header('Location login.php');
// }

if(!isset( $_GET['usr_id'])){
	alert_info("Error");
	die();
}
if(isset($_GET['pg_num']) && $_GET['pg_num']>1){
	$pg_num = $_GET['pg_num'];
} else {
	$pg_num = 1;
}

$usr_img_id = $_GET['usr_id'];
$img_per_page = 5;
$img_start = ($pg_num - 1) * $img_per_page;

$query = "SELECT * FROM `images` WHERE user_id=:id ORDER BY date_created DESC LIMIT $img_start,$img_per_page; ";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $usr_img_id]);

$images = $stmt->fetchAll();
?>
<!--
if uid == owner id:
	show delete button; -->


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
				<table>
				<?php
					if (!$images){
						echo("No images for user");
					}
					else foreach($images as $row)
					{
						$img_loc = $row['image_location'];
						if (file_exists($img_loc)){
							echo '  
								<tr>  
									<td>  
										<img src="'.$img_loc.'" height="300" width="400"/>  
									</td>  
								</tr>  
							';
						}
					}
				?>
				</table>

				<div id="pagination">
					<?php 
						// echo $_SERVER['QUERY_STRING'];

						// $output = array();
						// foreach(explode('&', $_SERVER['QUERY_STRING']) as $pair) {
						// 	list($id, $val) = explode('=', $pair);
						// 	$output[$id] = $val;
						// }

						// print_r( $output);
						// $output['pg_num'] += 1;
						// $nextpage = 

						$_GET['pg_num'] = $pg_num + 1;

						echo "<a href='user_images.php" . implode('&', $_GET) . "'> next page</a>";
					?>
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


