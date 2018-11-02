<?php 

// $testimg = "INSERT INTO `images` (user_id, image) VALUES (2, '$img')";
session_start();
require_once 'connect.php';

if (!isset($_SESSION['uid'])){
	header('Location: login.php');
}

$uid = $_SESSION['uid'];
$uploads_dir = "./imgs";
if(isset($_POST["insert"]))  
{ 
	$file = $_FILES["image"]["tmp_name"];

	// date("r",hexdec(substr(uniqid(),0,8))); //this converts uniqid into time
	$type = explode('/', $_FILES["image"]["type"]);
	$name = uniqid() . "." . $type[1];
	$store_location = "$uploads_dir/$name";
	// use finfo_open to verify type

	move_uploaded_file($file, $store_location);

	$uid = $_SESSION['uid'];
	$query = "INSERT INTO `images` (user_id, image_location) VALUES (:uid, :loc)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["uid" => $uid, "loc" => $store_location]); //use this for security

	header("Location: user_images.php?usr_id=$uid");
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
			<form method="POST"  enctype="multipart/form-data">  
					<input type="file" name="image" accept="image/*" />  
					<br />  
					<input type="submit" name="insert" value="Insert"/>  
			</form> 
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



