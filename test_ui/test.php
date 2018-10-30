<?php


$page = $_GET['page'];
	
if (!$page)
	echo "None";
else
{
	switch ($page)
	{
		case (''):
			echo "no page";
			break;
		case ('about'):
			echo "about";
			break;			
		case ('log_in'):
			echo "log in";
			break;
			
		case ('account'):
			echo "account";
			break;
			
	}
}
?>