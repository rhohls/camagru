<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "camagru";

try {
    $pdo = new PDO("mysql:host=$servername", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully" . PHP_EOL;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . PHP_EOL;
    die();
    }




try{
    $pdo->query("DROP DATABASE IF EXISTS `$dbname`");
    echo "Deleted database" . PHP_EOL;

}
catch(PDOException $e)
    {
    echo "Failed to delete database: " . $e->getMessage() . PHP_EOL;
    die();
    }

?>