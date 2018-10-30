<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();


$redirect = '#';
//function alert($str, $redirect)

$adjust_info = array();
$uid = $_SESSION['uid'];

if (!isset($_SESSION['uid'])){
	// header('Location: login.php');
	header('Location: loginpage.html');
}
else if ($_POST["submit"] == "OK")
{
	if ($_POST["passwd"] !== "")
	{
		if ($_POST["passwd"] !== $_POST["checkpasswd"])
			alert("Passwords do not match", $redirect);
		
		// password security level
		$pwd_error = checkPassword($_POST["passwd"]);
		if ($pwd_error){
			alert($pwd_error);
		}
		$hashedpwd = hashPW($_POST["passwd"]);
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

 	if ($adjust_str != ""){
		$query = "UPDATE `users` SET $adjust_str WHERE id=:uid;";

		$stmt = $pdo->prepare($query);
		$stmt->execute(['uid' => $uid]); //use this for security

		$changed = array_keys($adjust_info);
		alert_info('The following account info has been changed:\n'. implode(", ", $changed));
	 }
	 else{
		alert_info('Please enter information to change');
	 }
}
?>




<html>
	<script type='text/javascript' src='scripts.js'></script>
	<h1>Adjust account info</h1>
    <body>
        <form action="#" method="POST">
            New username: <input type="text" name="login" value=""/>
            <br />
            New password: <input type="password" name="passwd" value=""/>
            <br />
            Retype new password: <input type="password" name="checkpasswd" value=""/>
            <br />
            New email adress: <input type="email" name="email" value=""/>
			<br />
			Notify on comment: <select name="notify">
				<option value='no_change' >No Change</option>
				<option value='yes' >Yes</option>
				<option value='no' >No</option>
				</select>
            <br />
            <input type="submit" name="submit" value="OK"/>
        </form>
    </body>
</html>