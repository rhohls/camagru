<?php

require_once 'connect.php';
require_once 'generic_functions.php';


$ref = 'loginpage.html';
// change ref below
// function alert($str, $sfnenwfo)
// {
// 	echo "<script type='text/javascript'>
// 	alert('$str');
// 	window.location.href = 'loginpage.html'; 
// 	</script>";
// 	die();
// }

session_start();


if ($_POST["submit"] == "OK")
{
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "")
	{
		$login = $_POST["login"];
		$uid = -1;
		// $query = 'SELECT id, user_name FROM `users`';
		// foreach ($pdo->query($query) as $user) {
		// 	if ($user["user_name"] == $login){
		// 		$uid = $user["id"];
		// 		break;
		// 	}
		// }

		// if ($uid == -1){
		// 	alert("Details incorrect", $ref);
		// }

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
			$_SESSION['uid'] = $uid;
			$_SESSION['user_name'] = $login;
			$_SESSION['admin'] = $user['admin'];
			alert("You have been logged in", 'index.php');

		}
		header('Location: index.php');
	}
	else{
		alert("Please don't leave any field blank", $ref);
	}
}
else
	exit_();
?>
