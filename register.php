<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();

$redirect = 'reg.html';
$index = 'index.php';

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
		// SQL stuff
		$query = "INSERT INTO `users` (user_name, password, email, first_name, last_name, verification)
					VALUES (:usr_name, :password, :email, :first, :last, :code)";
		$stmt = $pdo->prepare($query);
		$stmt->execute(['usr_name' => $login, 'password' => $hashedpwd, 'email' => $email, 'first' => $first_name, 'last' => $last_name, 'code' => $code]); //use this for security

		// verification emaily
		$to = $email;
		$subject = "Registration";
		$headers = "From: noresponse@camagru.co.za";
		$txt = "Dear $login

		Thank you for registering to Camagru please go to the following link to activate your account:
		http://localhost:8080/cama/verify.php?usr_name=$login&code=$code&verify=true

		Kind Regards
		Camagru";
		mail($to,$subject,$txt,$headers);

		alert("You have been registered! Please check your email", $index);
	}
	else
		alert("Please don't leave any field blank", $redirect);
}

?>

<html>
    <h1>Register</h1>
    <body>
        <form action="./register.php" method="POST">
            Username: <input type="text" name="login" value=""/>
            <br />
            Password: <input type="password" name="passwd" value=""/>
            <br />
            Retype password: <input type="password" name="checkpasswd" value=""/>
            <br />
            Email adress: <input type="email" name="email" value=""/>
            <br />
            First Name: <input type="text" name="first_name" value=""/>
            <br />
            Last Name: <input type="text" name="last_name" value=""/>
            <br />
            <input type="submit" name="submit" value="OK"/>
        </form>
    </body>
</html>