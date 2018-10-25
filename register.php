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

function passwordCheck($pwd) {

    if (strlen($pwd) < 8) {
        return "Password too short!";
    }
    if (!preg_match("#[0-9]+#", $pwd)) {
        return "Password must include at least one number!";
    }
    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        return "Password must include at least one letter!";
    }     
    return "";
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
			alert($pwd_error);
		}

		// $hashedpwd = hash('Whirlpool', $_POST["passwd"]);
		$hashedpwd = $_POST["passwd"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];

		$query = 'INSERT INTO `users` (user_name, password, email, first_name, last_name) 
					VALUES (\''. $login .'\', \''. $hashedpwd .'\', \''. $email .'\', \''. $first_name .'\', \''. $last_name .'\' )';


		$stmt = $pdo->prepare($query);
		// echo $stmt;
		$stmt->execute(); //use this for security



		// echo "sending mail";

		// // verify emaily
		// $to = "rhohls@student.wethinkcode.co.za";
		// $subject = "My subject";
		// $headers = "From: rhohls@student.wethinkcode.co.za";
		// $txt = "Hello world!";
		// // $headers = "From: webmaster@example.com" . "\r\n" .
		// // "CC: somebodyelse@example.com";

		// mail($to,$subject,$txt,$headers);

		// echo "sent mail";
		alert("You have been registered!", 'index.php');

	}
	else
		alert("Please don't leave any field blank", $redirect);
}
else
	exit_();


?>
