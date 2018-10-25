<?php

function userExist($pdo, $user_name){

	$query = "SELECT user_name FROM `users` WHERE user_name=:user";
	$stmt = $pdo->prepare($query);
	$stmt->execute(['user' => $user_name]);
	// print_r($stmt);
	$result = $stmt->fetch();
	// $result = ($pdo->query($stmt))->fetch();

	// echo $result;

	if ($result)
		return true;
	else
		return false;
}

function alert($str, $redirect)
{
	echo "redirecting to " . $redirect;
	echo "<script type='text/javascript'>
	alert('$str');
	window.location.href = '$redirect'; 
	</script>";
	die();
}

function addQuotes($str){
	return ('\''.$str.'\'');
}

?>