<?php

require_once 'connect.php';
require_once 'generic_functions.php';

if (!isset($_SESSION['uid'])){
	header('Location: loginpage.html');
}

$uploads_dir = "./imgs";
if(isset($_POST["img"]))  
{ 
	$img = $_POST['img'];

	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$file = base64_decode($img);
	// date("r",hexdec(substr(uniqid(),0,8))); //this converts uniqid into time
	$type = "png";
	$name = uniqid() . "." . $type;
	$store_location = "$uploads_dir/$name";
	// use finfo_open to verify type

	file_put_contents($store_location, $file);

	$uid = $_SESSION['uid'];
	$query = "INSERT INTO `images` (user_id, image_location) VALUES (:uid, :loc)";
	$stmt = $pdo->prepare($query);
	$stmt->execute(["uid" => $uid, "loc" => $store_location]); //use this for security
}



?>