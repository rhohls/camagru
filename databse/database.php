<?php




$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "camagru";

require_once '../generic_functions.php';

// CONNECTING
try {
    $pdo = new PDO("mysql:host=$servername", $username, $password);
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
    $pdo->query("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $pdo->query("use `$dbname`");


    $init_table = "CREATE TABLE IF NOT EXISTS `users`
    (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_name VARCHAR(20) NOT NULL,
        password VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        first_name VARCHAR(32) NOT NULL,
        last_name VARCHAR(32) NOT NULL,
        confirmed INT DEFAULT 0,
        admin INT DEFAULT 0,
        active INT DEFAULT 0
    )";
    $pdo->query($init_table);
    

    if (!userExist($pdo, 'admin')){
        $query = 'INSERT INTO `users` (user_name, password, email, first_name, last_name, confirmed, admin, active)
        VALUES ("admin", "root", "none", "none", "none", 1, 1, 1)';
        $pdo->query($query);
    }
    // comments
    // likes
    // dislike    
    $init_table = "CREATE TABLE IF NOT EXISTS `images`
    (
        img_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        original_img_id INT,
        notify_creator INT DEFAULT 1,
        image LONGBLOB
    )";
    $pdo->query($init_table);
    // $img = get_file_contents('./test.png');
    // $testimg = "INSERT INTO `images` (user_id, image)
    // VALUES (2, '$img')";
    // $pdo->query($testimg);


    $init_table = "CREATE TABLE IF NOT EXISTS `stickers`
    (
        img_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        date_created DATE
    )";
    $pdo->query($init_table);



    echo "Databse created successfully!" . PHP_EOL;
    }

catch(PDOException $e)
    {
    echo "Failed to initialize database: " . $e->getMessage() . PHP_EOL;
    die();
    }

?>