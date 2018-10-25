<?php 

// $testimg = "INSERT INTO `images` (user_id, image) VALUES (2, '$img')";

require_once 'connect.php';
$uploads_dir = "./imgs";
if(isset($_POST["insert"]))  
{ 
	$file = $_FILES["image"]["tmp_name"];
	var_dump($_FILES);
	// $query = "INSERT INTO `images` (user_id, image) VALUES (2, '$file')";
	// $pdo->query($query);

	$tmp_name = $_FILES["pictures"]["tmp_name"];
	$name = basename($_FILES["pictures"]["name"]) . time();

	move_uploaded_file($tmp_name, "$uploads_dir/$name");
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
			<form method="post" >  
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
				$img = file_get_contents($row['image_location']);
					echo '  
						<tr>  
							<td>  
								<img src="data:image/jpg;base64,'. $img .'" height="200" width="200" class="img-thumnail" />  
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