<?php
	if ($_GET["logout"] == "OK")
	{
		session_start();
		session_destroy();
		header('Location: index.php');
		exit;	
	}

?>