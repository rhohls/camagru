<?php
require_once '../generic_functions.php';
require_once 'database.php';

// CONNECTING
try {
    $pdo = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully\n" . PHP_EOL;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . PHP_EOL;
    die();
    }



// CREATE DB
try{
    $pdo->query("CREATE DATABASE IF NOT EXISTS `$DB_NAME`");
    $pdo->query("use `$DB_NAME`");


    // User table
    $user_table = "CREATE TABLE IF NOT EXISTS `users`
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_name VARCHAR(20) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        first_name VARCHAR(32) NOT NULL,
        last_name VARCHAR(32) NOT NULL,
        notify INT DEFAULT 1,
        confirmed INT DEFAULT 0,
        admin INT DEFAULT 0,
        active INT DEFAULT 1,
        verification VARCHAR(32)
    );";
    $pdo->query($user_table);
    // adding admin
    if (!userExist($pdo, 'admin')){
        $pw = hashPW('root');
        $query = 'INSERT INTO `users` (user_name, password, email, first_name, last_name, confirmed, admin, active)
        VALUES ("admin", "'.$pw.'", "none", "none", "none", 1, 1, 1)';
        $pdo->query($query);
    }

    // Image Table
    $img_table = "CREATE TABLE IF NOT EXISTS `images`
    (
        img_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        likes INT DEFAULT 0,
        dislikes INT DEFAULT 0,
        date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        original_img_id INT,
        original INT DEFAULT 0,
        notify_creator INT DEFAULT 1,
        image_location VARCHAR(255) NOT NULL

    );";
    $pdo->query($img_table);

    // Sticker table
    $stick_table = "CREATE TABLE IF NOT EXISTS `stickers`
    (
        img_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );";
    $pdo->query($stick_table);

    // Comment table
    $comment_table = "CREATE TABLE IF NOT EXISTS `comments`
    (
        comment_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        commentator_id INT NOT NULL,
        comment TEXT NOT NULL,
        date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        img_id INT NOT NULL
    );";
    $pdo->query($comment_table);

    echo "Databse created successfully!" . PHP_EOL;
    }

catch(PDOException $e)
    {
    echo "Failed to initialize database: " . $e->getMessage() . PHP_EOL;
    die();
    }

?>