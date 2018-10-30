<?php

// var_dump($_POST);
session_start();
$id = array_search ('Update Quantity', $_POST);
if ($id)
{
	$new_qty = $_POST['new_qty'];

	$i=0;
	var_dump($_SESSION['basket']);

	foreach($_SESSION['basket'] as $item)
	{
		if ($item['id'] == $id)
		{
			break ;
		}
		$i++;
	}

	$_SESSION['basket'][$i]['quantity'] = $new_qty;
}
else
{
	$id = array_search ('Update Quantity', $_POST);
	if ($id)
	{
		$i=0;
		foreach($_SESSION['basket'] as $item)
		{
			if ($item['id'] == $id)
			{
				break ;
			}
			$i++;
		}
		unset($_SESSION['basket'][$i]);
	}
}

header("Location: index.php?page=basket");

?>