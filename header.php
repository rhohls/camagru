<?php 
function getUserName()
{
	if (isset($_SESSION['user_name']))
		echo $_SESSION['user_name'];
	else
		echo "Guest";
}
?>

<script> 

</script>
		<script type='text/javascript' src='javascript/scripts.js'></script>
<!-- This is ther header section -->
<div id="header_wrapper">
	<img id="logo" src="page_imgs/logo.png" />
		<!-- potential search bar -->
	<a id="name">Camagru</a>
	<form id="login_stuff" method="get" action="#">
		<a>Logged in as: <?php getUserName() ?></a>
		<!-- <button type="submit" name="logout" value="OK">Log Out</button></a> -->
		<a><button onclick="logOut();">Log Out js</button></a>
		<a href="logout.php"><button>Log Out a-ref</button></a>
		<a href="logout.php">Logout here</a>
	</form>
	<!-- other banner stuff -->
</div>

<!-- This is the menubar -->		
<div class="menu_bar">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="#">???</a></li>
		<li><a href="register.php">Register</a></li>
		<li><a href="login.php">Login</a></li>
		<?php
		if (isset($_SESSION['uid'])){
			echo "<a class='nav-link' href='adjust.php'>My Account</a>";
		}
		// else
		// 	echo "<a class='nav-link' href='login.php' >Login</a>";
		?>
		<!-- <li><img src='./images/basket.png' height="50px" ></li>
		<li>
			<?php //getBasketInfo() ?>
		</li> -->
		
		
	</ul>
</div>