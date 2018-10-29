<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();


$redirect = 'reg.html';
//function alert($str, $redirect)
function exit_()
{
	echo "ERROR\n";
	die();
}




if ($_POST["submit"] == "OK")
{
	
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "" && $_POST["checkpasswd"] !== "" && $_POST["first_name"] !== "" && $_POST["last_name"] !== "" && $_POST["email"] !== "")
	{
		if ($_POST["passwd"] !== $_POST["checkpasswd"])
			alert("Passwords do not match", $redirect);


		$login = $_POST["login"];		      

		if (userExist($pdo, $login)){
			alert("username taken", $redirect);
		}

		// password security level
		$pwd_error = checkPassword($_POST["passwd"]);
		if ($pwd_error){
			alert("Passwords not secure enough", $redirect);
		}

		$hashedpwd = hashPW($_POST["passwd"]);
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];

		$code = hash('md5', $login.uniqid());

		$query = "INSERT INTO `users` (user_name, password, email, first_name, last_name, verification) 
					VALUES (:usr_name, :password, :email, :first, :last, :code)";

		$stmt = $pdo->prepare($query);
		// echo $stmt;
		$stmt->execute(['usr_name' => $login, 'password' => $hashedpwd, 'email' => $email, 'first' => $first_name, 'last' => $last_name, 'code' => $code]); //use this for security



		// echo "sending mail";

		// verify emaily
		$to = $email;
		$subject = "My subject";
		$headers = "From: noresponse@camagru.co.za";
		$txt = "Dear $login
		
		Thank you for registering to Camagru please go to the following link to activate your account:
		http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&verify=true
		
		Kind Regards
		Camagru";

		mail($to,$subject,$txt,$headers);

		// echo "sent mail";
		alert("You have been registered!\n Please check your email", 'index.php');

	}
	else
		alert("Please don't leave any field blank", $redirect);
}
else
	exit_();


?>
