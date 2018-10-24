<?php

require_once 'connect.php';
require_once 'generic_functions.php';



function alert($str)
{
	echo "<script type='text/javascript'>
	alert('$str');
	window.location.href = 'reg.html';
	</script>";
	die();
}

function exit_()
{
	echo "ERROR\n";
	die();
}
session_start();

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

function userExist($user_name){

	echo "looking for user: " . $user_name;

	$query = 'SELECT user_name FROM `users`';
	// $query = "SELECT user_name FROM `users` WHERE user_name=$user_name";

	foreach ($pdo->query($query) as $row) {

		if ($row["user_name"] == $user_name){
			return true;
		}
	}
	echo"falsing";
	return false;
}



if ($_POST["submit"] == "OK")
{
	
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "" && $_POST["checkpasswd"] !== "" && $_POST["first_name"] !== "" && $_POST["last_name"] !== "" && $_POST["email"] !== "")
	{
		if ($_POST["passwd"] !== $_POST["checkpasswd"])
			alert("Passwords do not match");


		$login = $_POST["login"];		      

		if (userExist($login)){
			alert("username taken");
		}

		// $pwd_error = checkPassword($_POST["passwd"]);

		// if ($pwd_error){
		// 	alert($pwd_error);
		// }


		// $hashedpwd = hash('Whirlpool', $_POST["passwd"]);
		$hashedpwd = $_POST["passwd"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];

		$query = 'INSERT INTO `users` (user_name, password, email, first_name, last_name) 
					VALUES (\''. $login .'\', \''. $hashedpwd .'\', \''. $email .'\', \''. $first_name .'\', \''. $last_name .'\' )';

		// echo $query;
		// echo"    q done     ";
		$stmt = $pdo->prepare($query);
		
		// echo" prepared";
		
		// echo $stmt;
		$stmt->execute(); //use this for security
		// $pdo->query($query);
		// echo "   12    ";
		
	}
	else
		alert("Please don't leave any field blank");
}
else
	exit_();

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


?>
