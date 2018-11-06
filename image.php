<?php

session_start();
require_once 'connect.php';
require_once 'generic_functions.php';

// if (isset($_SESSION['uid']) && ){

// }
// else
// 	header('Location login.php');
// }

if(!isset($_GET['img_id'])){
	alert_info("Error");
	die();
}
$img_id = $_GET['img_id'];

$query = "SELECT * FROM `images` WHERE img_id=:id";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $img_id]);

$image = $stmt->fetch();

$query = "SELECT * FROM `comments` JOIN `users` ON comments.commentator_id=users.id WHERE comments.img_id=:id;";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $img_id]);

$comments = $stmt->fetchAll();


var_dump($_SESSION);
var_dump($_POST);

if ((isset($_SESSION['uid'])) && (isset($_POST['like']) || isset($_POST['dislike']) || isset($_POST['comment_txt']) ))
{
	if (isset($_POST['like'])){
		$query = "UPDATE `images` SET likes=likes+1 WHERE img_id=:id;";
		$stmt = $pdo->prepare($query);
		$stmt->execute(["id" => $img_id]);
		header("Refresh:0");
	}
	elseif (isset($_POST['dislike'])){
		$query = "UPDATE `images` SET dislikes=dislikes+1 WHERE img_id=:id;";
		$stmt = $pdo->prepare($query);
		$stmt->execute(["id" => $img_id]);
		header("Refresh:0");
	}
	elseif (isset($_POST['comment_txt'])){
		if ($_POST['comment_txt'] == ''){
			alert_info("Please dont leave the comment blank");
		}else{
			$query = "INSERT INTO `comments` (commentator_id, comment, img_id) VALUES (:commentator_id, :comment, :img_id);";
			$stmt = $pdo->prepare($query);
			$stmt->execute(["commentator_id" => $_SESSION['uid'], "comment" => $_POST['comment_txt'], "img_id" => $img_id]);
			header("Refresh:0");
		}
	}
}
else if ((!isset($_SESSION['uid'])) && (isset($_POST['like']) || isset($_POST['dislike']) || isset($_POST['comment_txt']) )) {
	alert_info('Please log in');
	// echo "<br>sdfsdf";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>Camagru</title>
</head>
<body>
	<div class="main_wrapper">
		<!-- Header --><?php require_once('header.php'); ?>
		<div class="content_wrapper">
			

			<!-- Main content -->

			<!-- if images doesnt exist -->
			<div id="items">
				<?php
					echo '<img src="'.$image['image_location'].'" height="300" width="400"/> ';
					echo ' <p> number of likes:'. $image['likes'] .' number of dislikes: '. $image['dislikes'] .'</p>';
				?>
				
				<form method="POST" id="image_form">
						<input type="submit" name="like" value="Like"/>  
						<input type="submit" name="dislike" value="Dislike"/>
						<br>
						<br>
						<textarea name="comment_txt"  ></textarea>
						<br>
						<input type="submit" name="comment" value="comment"/>
				</form>

				<table id="comments">
				<?php
				foreach($comments as $comment)
				{
					$txt = $comment['comment'];
					$usr_name = $comment['user_name'];
					echo '  
						<tr>  
							<td>
								<p> '.$usr_name .':</p>
								<p> '.$txt .'</p>
							</td>  
						</tr>  
					';
				}
				?>
				</table>
			</div>
			<!-- End main contents -->


		<!-- Sidebar --><?php require_once('sidebar.php'); ?>
		</div>
		<!-- <br> -->
		<!-- footer -->
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>


