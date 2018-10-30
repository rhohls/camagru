<?php

session_start();

function getUserName()
{
	$id = $_SESSION['userID'];
	if ($id)
		echo $id;
	else
		echo "Guest";
}

?>
