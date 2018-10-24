<?php

require_once 'connect.php';
// require_once 'generic_functions.php';


$ref = 'loginpage.html';
// change ref below
function alert($str, $sfnenwfo)
{
	echo "<script type='text/javascript'>
	alert('$str');
	window.location.href = 'loginpage.html'; 
	</script>";
	die();
}

function exit_()
{
	echo "ERROR\n";
	die();
}
session_start();


if ($_POST["submit"] == "OK")
{
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "")
	{
		$login = $_POST["login"];		      
		$uid = -1;
		$query = 'SELECT id, user_name FROM `users`';
		foreach ($pdo->query($query) as $user) {
			if ($user["user_name"] == $login){
				$uid = $user["id"];
				break;
			}
		}

		if ($uid == -1){
			alert("Details incorrect", $ref);
		}

		$query = "SELECT * FROM `users` WHERE id=$uid";
		$hashedpwd = ($_POST["passwd"]);
		$user = ($pdo->query($query))->fetch();

		if ($hashedpwd != $user['password']){
			alert("Details incorrect", $ref);
		}
		$_SESSION['uid'] = $uid;
		$_SESSION['user_name'] = $login;
		header('Location: index.php');
	}
	else{
		echo "123";
		alert("Please don't leave any field blank", $ref);
		echo "456";
	}
}
else
	exit_();
?>
