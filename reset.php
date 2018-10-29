<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();

$redirect = 'reset.html';

var_dump($_POST);



if (isset($_POST["type"])){
	if ($_POST["login"] !== "" && $_POST["email"] !== "")
	{
		$login = $_POST["login"];
		$input_email = $_POST["login"];
		$uid = -1;

		$query = "SELECT * FROM `users` WHERE user_name=:login";
		$stmt = $pdo->prepare($query);
		$stmt->execute(['login' => $login]);
		$user = $stmt->fetch();

		if (!$user || $user['email'] !== $input_email){
			alert("Details incorrect", $redirect);
		}


		if ($_POST["type"] == 'resend'){
			$code = $user['code'];
			$to = $email;
			$subject = "My subject";
			$headers = "From: noresponse@camagru.co.za";
			$txt = "Dear $login
			
			Thank you for registering to Camagru please go to the following link to activate your account:
			http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&verify=true
			
			Kind Regards
			Camagru";
	
			mail($to,$subject,$txt,$headers);
		}
		elseif (isset($_POST['password'])){
			$code = $user['code'];
			$to = $email;
			$subject = "My subject";
			$headers = "From: noresponse@camagru.co.za";
			$txt = "Dear $login
			
			Thank you for registering to Camagru please go to the following link to activate your account:
			http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&verify=true
			
			Kind Regards
			Camagru";
	
			mail($to,$subject,$txt,$headers);
		}



	}
	else {
		alert("Please dont leave any field blank", $redirect);
	}
}
else
	exit_();

?>