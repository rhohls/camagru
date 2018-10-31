
<!-- This is ther header section -->
<div id="header_wrapper">
	<img id="logo" src="./images/logo.png" />
		<!-- potential search bar -->
	<a id="name">Crafty Furniture</a>
	<form id="login_stuff" method="get" action="#">
		<a>Logged in as: <?php getUserName() ?></a>
		<button type="submit" name="logout" value="OK">Log Out</button></a>
	</form>
	<!-- other banner stuff -->
</div>

<!-- This is the menubar -->		
<div class="menu_bar">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.php?page=about">About</a></li>
		<li><a href="index.php?page=log_in">Login/Register</a></li>
		<?php
		if (isset($_SESSION['uid'])){
			echo "<a class='nav-link' href='adjust.php'>My Account</a>";
		}
		else
			echo "<a class='nav-link' href='login.php' >Login</a>";
		?>
		<li><img src='./images/basket.png' height="50px" ></li>
		<li>
			<?php getBasketInfo() ?>
		</li>
		
		
	</ul>
</div>