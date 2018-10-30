<?php
// pass category to function
function getProductsHome()
{
	//hompage

	foreach($var as $item)
	{ 
		$img_loc = $item[];
		$id = $item[];
		$partial_descrip = substr($item[], 0, 10);
		$item_name = $item[];
		$price = $item[];
		echo "
		<div id='single_product'>
			<a href='index.php?page=product&id=$id'><img src='$img_loc' width='180' height='180' /></a>
			<div id='product_text'>
				<h4>$item_name</h4>
				<a> $partial_descrip</a>
				<p>Price: R$price</p>
				<a href='index?addtocart=$id'><button>Add to Cart</button></a>
			</div>
		</div>";
	}
}


function getProductsBasket()
{
	
	echo "<div id='single_product'>
		<a href='#'><img src='./images/chair.jpeg' width='180' height='180' /></a>
		<div id='product_text'>
		<form action='./adjust_basket.php' method='POST'>
			<h4>Chair</h4>
			<p>Price: R100</p>
			<label>Quantity</label>
			<input type='text' name='new_qty' id='quantity_wanted' class='text' value='1' size='2' maxlength='3'/>
			<input type='submit' name='1' value='Update Quantity'/>
			<input type='submit' name='1' value='Remove Item'/>			
			<p>Net price: R200</p>
		</div>";
		
		// <input type='submit' name='submit' value='1'/> value == $id
		
	// echo "<a href='checkout.php'><button id='checkout_button'>Checkout</button></a>";	
	
}





?>