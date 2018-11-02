<?php 
function getUserName()
{
	if (isset($_SESSION['user_name']))
		echo $_SESSION['user_name'];
	else
		echo "Guest";
}
?>

<script type='text/javascript' src='javascript/scripts.js'></script>

<!-- This is ther header section -->
<div id="header_wrapper">
	<img id="logo" src="page_imgs/logo.png" />
	<a id="name">Camagru</a>

	<div id="login_stuff">
		<a>Logged in as: <?php getUserName() ?></a>
		<a><button onclick="logOut();">Log Out</button></a>
	</div>
</div>

<!-- This is the menubar -->		
<div class="menu_bar">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="take_picture.php">Take a picture</a></li>
		<li><a href="upload_image.php">Upload Image</a></li>
		<!-- <li><a href="register.php">Register</a></li> -->
		<!-- <li><a href="login.php">Login</a></li> -->
		
		<?php
		if (isset($_SESSION['uid'])){
			// echo "<a class='nav-link' href='adjust.php'>My Account</a>";
			echo "<li><a href='adjust.php'>My Account</a></li>";
		}else{
			// echo "<a class='nav-link' href='login.php' >Login</a>";
			echo "<li><a href='register.php'>Register</a></li>";
			echo "<li><a href='login.php'>Login</a></li>";
		}
		?>

	</ul>
</div>