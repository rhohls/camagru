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
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=about">About</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="account.php">My Account</a></li>
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
				
				<!-- Template for products -->
				<h2>Products</h2>
				<div id="single_product">
					<a href='#'><img src='./images/chair.jpeg' width='180' height='180' /></a>
					<div id="product_text">
						<h4>Chair</h4>
						<a> partial item description</a>
						<p>Price: R100</p>
						<button>Add to Cart</button>
					</div>
				</div>
				
				<!-- Template for item -->
				<h2>Single Item</h2>
				<div id="single_product">
					<a href='#'><img src='./images/chair.jpeg' width='180' height='180' /></a>
					<div id="product_text">
						<h4>Chair</h4>
						<a> Full Discription of item</a>
						<p>Price: R100</p>
						<label>Quantity</label>
						<input type="text" name="qty" id="quantity_wanted" class="text" value="1" size="2" maxlength="3"/>
						<a href='additem.php'><button>Add to Cart</button></a>
					</div>
				</div>
				
				<!-- Template for basket -->
				<!-- also reload to set amount in qnty -->
				<h2>basket Item</h2>
				<div id="single_product">
					<a href='#'><img src='./images/chair.jpeg' width='180' height='180' /></a>
					<div id="product_text">
						<h4>Chair</h4>
						<p>Price: R100</p>
						<label>Quantity</label>
						<input type="text" name="qty" id="quantity_wanted" class="text" value="1" size="2" maxlength="3"/>
						<a href='additem.php'><button>Change Quantity</button></a>
						<p>Net price: R200</p>
					</div>
				</div>
				
				<a href='checkout.php'><button id="checkout_button">Checkout</button></a>
				
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