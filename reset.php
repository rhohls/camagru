<?php

require_once 'connect.php';
require_once 'generic_functions.php';
session_start();


$redirect = 'reset.html';



var_dump($_POST);

if (isset($_POST['verify'])){
	// email exists
	// resend
}
elseif (isset($_POST['password'])){
	// email exists
	// password reset email
}


?>