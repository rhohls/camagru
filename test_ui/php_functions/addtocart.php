<?php
// session_start();
function getBasketInfo()
{
	session_start();
	$basket = $_SESSION['basket'];
	// var_dump($basket);
	$num_items = 0;
	$cost = 0;
	foreach($_SESSION['basket'] as $item)
	{
		$num_items += $item['quantity'];
		$cost += $item['quantity'] * $item['price'];
	}
	

	echo"<span>Total items: $$num_items</span>
	<br>
	<span>Net cost: R$cost</span>";
}


if (isset($_GET["addtocart"]))
{
	// header("Location index.php?page=log_in");
	//session_start();
	
	$basket = $_SESSION['basket'];
	// var_dump($basket);
	
	$id = $_GET["addtocart"];
	$added = 0;
	foreach($_SESSION['basket'] as $item)
	{
		// var_dump($item);
		if ($item['id'] == $id)
		{
			echo "adding\n";
			$added = 1;
			echo '<script>alert("Item Already in cart")</script>';	
		}
	}
	// get price for id
	if ($added != 1)
	{
		if (isset($_GET["quantity"]))
			$quantity = $_GET["quantity"];
		else
			$quantity = 1;
		
		$newitem = array('id'=>$id, 'quantity'=>1, 'price'=>10);
		$num = count($_SESSION['basket']);
		$_SESSION['basket'][$num] = $newitem;
		// header("Location index.php?page=log_in");
	}
	
		
}







?>