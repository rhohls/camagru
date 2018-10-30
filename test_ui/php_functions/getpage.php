<?php

function pageAccount(){
	if (isset($_SESSION['uid']))
		echo "<h2>My Account</h2>
					<form action='change_pass.php' method='post'>
						<table id='login_table'>
							
							<tr><td>Username:</td>
								<td>
									<a><input type='text' name='login' value=''/></a>
								</td>								
							</tr>
							<tr><td>Old Password:</td>
								<td>
									<a><input type='password' name='old_password' value=''/></a>
								</td>								
							</tr>
							
							<tr><td>New Password:</td>
								<td>
									<a><input type='password' name='new_password' value=''/></a>
								</td>								
							</tr>
							
							<tr align='right'>
								<td><input type='submit' name='change_pwd' value='Change Password'/></td>
							</tr>
						</table>
					</form>
					
					<form action='change_ship.php' method='post'>
						<table id='login_table'>
							
							<tr><td>Shipping Address:</td>
								<td>
									<a><input type='text' name='address' value=''/></a>
								</td>								
							</tr>
							
							<tr align='right'>
								<td><input type='submit' name='change_ship' value='Change Address'/></td>
							</tr>
						</table>
					</form>	";
	else
		header('Location: index.php?page=log_in');

}

function pageAbout(){
	echo "<h2>We sell furniture</h2>";
}

function pageContact(){
	echo "<h2>Please don't</h2>";
}

function pageSign(){
	echo "<h2>Login</h2>
	<div id='login'>
		<form action='index.php?' method='post'>
			<table id='login_table'>
				
				<tr>
					<td>Username:</td>
					<td>
						<a><input type='text' name='login' value=''/></a>
					</td>								
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<a><input type='password' name='password' value=''/></a>
					</td>								
				</tr>
				
				<tr align='right'>
					<td><input type='submit' name='login_submit' value='Login'/></td>
				</tr>
				
			</table>
		</form>
	</div>
	
	<h2>Register</h2>
	<div id='login'>
		<form action='register.php' method='POST'>
			<table id='login_table'>
				
				<tr><td>Username:</td>
					<td>
						<a><input type='text' name='login' value=''/></a>
					</td>								
				</tr>
				<tr><td>Password:</td>
					<td>
						<a><input type='password' name='password' value=''/></a>
					</td>								
				</tr>
				
				<tr><td>Email Adress:</td>
					<td>
						<a><input type='text' name='email' value=''/></a>
					</td>								
				</tr>
				
				<tr><td>Shipping Address:</td>
					<td>
						<a><input type='text' name='address' value=''/></a>
					</td>								
				</tr>
				
				
				<tr align='right'>
					<td><input type='submit' name='register_submit' value='register'/></td>
				</tr>
			</table>
		</form>
	</div>";
}

function pageHome(){
	echo "<h2>All Products</h2>\n
	<div id='single_product'>
		<a href='#'><img src='./images/chair.jpeg' width='180' height='180' /></a>
		<div id='product_text'>
			<h4>Chair</h4>
			<a> partial item description</a>
			<p>Price: R100</p>
			<a href='index.php?addtocart=1'><button>Add to Cart</button></a>
		</div>
	</div>	";
}

function pageOneProduct(){
	echo "<h2>Item</h2>\n";
	
}
// <a href='additem.php'><button>Change Quantity</button></a>
function pageBasket(){
	echo "<h2>Basket</h2>\n";

	
}


function getPage(){
	
	
	$page = $_GET['page'];
	
	if (!$page)
		pageHome();
	else
	{
		switch ($page)
		{
			case (''):
				pageHome();
				break;
				
			case ('about'):
				pageAbout();
				break;
				
			case ('log_in'):
				pageSign();
				break;
				
			case ('account'):
				pageAccount();
				break;
				
			case ('contact'):
				pageContact();
				break;
				
			case ('basket'):
				pageBasket();
				break;
				
			case ('product'):
				pageOneProduct();
				break;
				
		}
	}
}





?>