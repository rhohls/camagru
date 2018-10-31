<?php

session_start();
require_once 'connect.php';
require_once 'generic_functions.php';

// if (isset($_SESSION['uid']) && ){

// }
// else
// 	header('Location login.php');
// }

if(!isset( $_GET['usr_id'])){
	alert_info("Error");
	die();
}

$usr_img_id = $_GET['usr_id'];

$query = "SELECT * FROM `images` WHERE user_id=:id ORDER BY date_created DESC ";
$stmt = $pdo->prepare($query);
$stmt->execute(["id" => $usr_img_id]);

$result = $stmt->fetchAll();

if (!$result){
	echo("No images for user");
}

else foreach($result as $row)
{
	$img_loc = $row['image_location'];
	if (file_exists($img_loc)){
		echo '  
			<tr>  
				<td>  
					<img src="'.$img_loc.'" height="200" width="200"/>  
				</td>  
			</tr>  
		';
	}
}  
?>
<!-- list all user images from the get php;

if uid == owner id:
	show delete button; -->

