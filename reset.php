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
		$input_email = $_POST["email"];

		$query = "SELECT * FROM `users` WHERE user_name=:login";
		$stmt = $pdo->prepare($query);
		$stmt->execute(['login' => $login]);
		$user = $stmt->fetch();
		// echo $login.'</br>';
		// var_dump($user);
		if (!$user || $user['email'] !== $input_email){
			alert("Details incorrect", $redirect);
		}
		$uid = $user['id'];

	
		$code = hash('md5', $login.uniqid());

		$query = "UPDATE `users` set verification=:new_code WHERE id=:uid";
		$stmt = $pdo->prepare($query);
		$stmt->execute(['uid' => $uid, 'new_code' => $code]);
	

		if ($_POST["type"] == 'resend'){
			$to = $input_email;
			$subject = "My subject";
			$headers = "From: noresponse@camagru.co.za";
			$txt = "Dear $login
			
			Thank you for registering to Camagru please go to the following link to activate your account:
			http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&verify=true
			
			Kind Regards
			Camagru";

			mail($to,$subject,$txt,$headers);
			alert("A new email with a verification link has been sent", $redirect);
		}
		elseif ($_POST["type"] == 'reset' && $user['confirmed'] == 1){
			$to = $input_email;
			$subject = "Password Reset";
			$headers = "From: noresponse@camagru.co.za";
			$txt = "Dear $login
			
			You have attempted to reset your password. To do this goto the following link:
			http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&reset_pw=true
			
			Kind Regards
			Camagru";

			mail($to,$subject,$txt,$headers);
			alert("An email with a reset link has been sent", $redirect);
		}
	}
	else {
		alert("Please dont leave any field blank", $redirect);
	}
}
else
	exit_();
?>


<html>
    <h1>Reset</h1>
    <body>
		<form action="./reset.php" method="POST">
			Username: <input type="text" name="login" value=""/>
            <br />
            Email: <input type="email" name="email" value=""/>
            <br />
            <button type="submit" name="type" value="reset">Reset Password</button>
            <button type="submit" name="type" value="resend">Resend verification email</button>
        </form>
    </body>
</html>