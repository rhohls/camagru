<?php 

// $testimg = "INSERT INTO `images` (user_id, image) VALUES (2, '$img')";

require_once 'connect.php';
$uploads_dir = "./imgs";


if (!isset($_SESSION['uid'])){
	header('Location: loginpage.html');
}

if(isset($_POST["insert"]))  
{ 
	$file = $_FILES["image"]["tmp_name"];

	// date("r",hexdec(substr(uniqid(),0,8))); //reverse uniqid into a time
	$type = explode('/', $_FILES["image"]["type"]);
	$name = uniqid() . "." . $type[1];
	$store_location = "$uploads_dir/$name";
	// use finfo_open to verify type

	move_uploaded_file($file, $store_location);

	$uid = $_SESSION['uid'];
	$query = "INSERT INTO `images` (user_id, image_location) VALUES ('$uid', '$store_location')";
	$stmt = $pdo->prepare($query);
	$stmt->execute(); //use this for security

}

?>  
<!DOCTYPE html>  
<html>  
	<head>
	</head>  
	<body>  
		<br /><br />  
		<div class="container" style="width:500px;">  
			<h3 align="center">Insert and Display Images From Mysql Database in PHP</h3>  
			<br />  
			<form method="post"  enctype="multipart/form-data">  
					<input type="file" name="image" />  
					<br />  
					<input type="submit" name="insert" value="Insert"/>  
			</form>  
			<br />  
			<table >  
					<tr>  
						<th>Image</th>  
					</tr>  
			<?php  
			$query = "SELECT * FROM `images` ORDER BY date_created DESC";  
			$result = ($pdo->query($query))->fetchAll();
			// print_r($result);
			// echo 
			foreach($result as $row)
			{
				// echo $row['img_id'];
				// $img = file_get_contents($row['image_location']);
				// $img = readfile($row['image_location']);
				$img_loc = $row['image_location'];
					echo '  
						<tr>  
							<td>  
								<img src="'.$img_loc.'" height="200" width="200" class="img-thumnail" />  
							</td>  
						</tr>  
					';  
			}  
			?>  
			</table>  
		</div>  
	</body>  
</html>  
<script>  
$(document).ready(function(){  
	$('#insert').click(function(){  
		var image_name = $('#image').val();  
		if(image_name == '')  
		{  
			alert("Please Select Image");  
			return false;  
		}  
		else  
		{  
			var extension = $('#image').val().split('.').pop().toLowerCase();  
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
			{  
					alert('Invalid Image File');  
					$('#image').val('');  
					return false;  
			}  
		}  
	});  
});  
</script> 