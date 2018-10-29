<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();


$redirect = 'index.php';

if (isset($_GET['usr_name']) && isset($_GET['code'])){
	$user_name = $_GET['usr_name'];
	$code = $_GET['code'];

	$query = "SELECT * FROM `users` WHERE user_name=:username";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['username'=>$user_name]);
	$user = $stmt->fetch();
	$uid = $user['id'];

	if (!$user ){
		alert("Error with verification, Please contact an admin\nCode:4721", $redirect);
	}
	elseif ($code != $user['verification']){
		alert("Error with verification, Please contact an admin\nCode:9342", $redirect);
	}
	// verification
	elseif ($_GET['verify'] == 'true'){
		$query = "UPDATE `users` set confirmed=1 WHERE id=:uid";

		$stmt = $pdo->prepare($query);
		$stmt->execute(['uid' => $uid]);

		alert("Your account is now verified, you can now login
		", $redirect);
	}
	elseif ($_GET['reset_pw'] == 'true'){
		$random_pw = uniqid();
		$hased_pw = hashPW($random_pw);

		$to = $user['email'];
		$subject = "New Password";
		$headers = "From: accounts@camagru.co.za";
		$txt = "Your new password is: ". $random_pw;

		mail($to,$subject,$txt,$headers);

		// sql update
		$query = "UPDATE `users` set confirmed=1 WHERE id=:uid";

		$stmt = $pdo->prepare($query);
		$stmt->execute(['uid' => $uid]);

		alert("An email with a new password has been sent", $redirect);
	}


}