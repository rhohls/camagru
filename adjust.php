<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();


$redirect = 'adjust.html';
//function alert($str, $redirect)
function exit_()
{
	echo "ERROR\n";
	die();
}

$adjust_info = array();
$uid = $_SESSION['uid'];
echo $uid . "</br>";

if(0){//!isset($_SESSION['uid'])){
	// redirect
}
else if ($_POST["submit"] == "OK")
{
	// $str = "";
	// foreach($_POST as $key => $value){
	// 	if ($key != "submit" || $key != "checkpasswd"){
	// 		$str = $str . ", " . $key;
	// 	}
	// }
	
	// echo $str;

	if ($_POST["passwd"] !== "")
	{
		if ($_POST["passwd"] !== $_POST["checkpasswd"])
			alert("Passwords do not match", $redirect);

		
		// password security level
		$pwd_error = checkPassword($_POST["passwd"]);
		if ($pwd_error){
			alert($pwd_error);
		}

		$hashedpwd = hasPW($_POST["passwd"]);
		$adjust_info["password"] = addQuotes($hashedpwd);
	}
	
	if ($_POST["login"] !== "")	{
		if (userExist($pdo, $_POST["login"])){
			alert("Username already taken", $redirect);
		}

		$adjust_info["user_name"] = addQuotes($_POST["login"]);
	}

	if ($_POST["email"] !== "")	{
		$adjust_info["email"] = addQuotes($_POST["email"]);
	}	

	if ($_POST["notify"] !== "no_change")	{
		$adjust_info["notify"] = addQuotes($_POST["notify"]);
	}


	$adjust_str =  urldecode(http_build_query($adjust_info,'\'',', '));

	// echo $adjust_str . '</br>';

	$query = "UPDATE `users` SET $adjust_str WHERE id=$uid;";

	// echo $query;
	$stmt = $pdo->prepare($query);
	// var_dump($stmt);
	$stmt->execute(); //use this for security

	$changed = array_keys($adjust_info);
	alert('Your account info has been changed:\n'. implode(", ", $changed) , $redirect);


	// !! alort the follow were adjusted:


}
else
	exit_();


?>
