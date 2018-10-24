<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "camagru";

try {
    $pdo = new PDO("mysql:host=$servername", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("use $dbname");
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . PHP_EOL;
    die();
    }


?>