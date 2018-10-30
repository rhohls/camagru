<html>
	<?php
	
	
	require_once './php_functions/sidebar.php';
	require_once './php_functions/username.php';
	if ($_GET["logout"] == "OK")
	{
		session_start();
		session_destroy();
		header('Location: index.php');
		exit;
	}
	
	?>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Ye Olde Shoppe</title>
</head>
<body>
	<div class="main_wrapper">
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
		
		<!-- This is hte menubar -->		
		<div class="menu_bar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Contact us</a></li>
				<li><a href="#">Basket</a></li>
				<li><img src='./images/basket.png' height="50px" ></li>
				<li>
					<?php getBasketInfo() ?>
				</li>
				
				
			</ul>
		</div>
		<div class="content_wrapper">
			<!-- side bar -->
			<div id="side_bar">
				<!-- hyperlink categories to a cat page? -->
				<div id="categories_title">Room Type</div>
				<ul id="cat_list">
										
					<?php getSidebarCat() ?>

				</ul>
				<div class="padding"></div>
				<div id="categories_title2">Furniture Type</div>
				<ul id="cat_list">
					
					<?php getSidebarCat2() ?>
				
				</ul>
			</div>
			
			
			<!-- Main content -->
			
			
			
			<div id="products">
				
				<h2>My Account</h2>
				<form action="change_pass.php" method="post">
					<table id="login_table">
						
						<tr><td>Username:</td>
							<td>
								<a><input type="text" name="login" value=""/></a>
							</td>								
						</tr>
						<tr><td>Old Password:</td>
							<td>
								<a><input type="password" name="old_password" value=""/></a>
							</td>								
						</tr>
						
						<tr><td>New Password:</td>
							<td>
								<a><input type="password" name="new_password" value=""/></a>
							</td>								
						</tr>
						
						<tr align="right">
							<td><input type="submit" name="change_pwd" value="Change Password"/></td>
						</tr>
					</table>
				</form>
				
				<form action="change_ship.php" method="post">
					<table id="login_table">
						
						<tr><td>Shipping Address:</td>
							<td>
								<a><input type="text" name="address" value=""/></a>
							</td>								
						</tr>
						
						<tr align="right">
							<td><input type="submit" name="change_ship" value="Change Address"/></td>
						</tr>
					</table>
				</form>	
				
			</div>
			<!-- End main contents -->
			
		</div>
		<!-- <br> -->
		<!-- <div id="footer">
			this is the footer
		</div> -->
	</div>
</body>
</html>