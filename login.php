<?php
require_once 'connect.php';
require_once 'generic_functions.php';
session_start();

$ref = 'loginpage.html';
$index = 'index.php';

if ($_POST["submit"] == "OK")
{
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "")
	{
		$login = $_POST["login"];
		$uid = -1;

		$query = "SELECT * FROM `users` WHERE user_name=:login";
		$stmt = $pdo->prepare($query);
		$stmt->execute(['login' => $login]);
		$user = $stmt->fetch();
		// user_name, password, email, first_name, last_name, confirmed, admin, active
		if (!$user){
			alert("Details incorrect", $ref);
		}
		$hashedpwd = hashPW($_POST["passwd"]);

		if ($hashedpwd != $user['password']){
			alert("Details incorrect", $ref);
		}
		elseif ($user['confirmed'] == 0){
			alert("Please confirm your account", $ref);
		}
		elseif ($user['active'] == 0){
			alert("Your account has been deactivated\nPlease contact an admin", $ref);
		}
		else{
			$_SESSION['uid'] = $user['id'];
			$_SESSION['user_name'] = $user['user_name'];
			$_SESSION['admin'] = $user['admin'];
			alert("You have been logged in", 'index.php');
		}
		alert("Something went wrong", 'index.php');
	}
	else{
		alert("Please don't leave any field blank", $ref);
	}
}
?>


<html>
    <h1>Login</h1>
    <body>
        <form action="./login.php" method="POST">
            Username: <input type="text" name="login" value=""/>
            <br />
            Password: <input type="password" name="passwd" value=""/>
            <input type="submit" name="submit" value="OK"/>
        </form>
        <a href='reset.html'><button>Forgot Passowrd</button></a>
        <a href='reset.html'><button>Resend verfication email</button></a>
    </body>
</html>