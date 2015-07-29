<?php
/*
	addtocart.php - adds menu items to user's cart
*/
session_start();

// make sure the 'item' is set.  Don't want to enter blank lines to cart
if (!isset($_POST["item"]) )
{
	header("Location: cart.php");
	exit();
}

$item = $_POST["item"];
$size = $_POST["size"];
$extras = $_POST["extras"];
$category = $_POST["cat"];

// validate the quantity...
if (isset($_POST["quantity"]) )
{
	$quantity = $_POST["quantity"];
	if($quantity < 1)
	{
		header("Location: cart.php");
		exit();
	}
	else if(!is_numeric($quantity))
	{
		header("Location: cart.php");
		exit();
	}
}

// build the pasta variable if it exists
if (isset($_POST['pasta']))
{
	$pasta = $_POST["pasta"]." - ";
	$class = $_POST["class"];
}
else
{
	$pasta = "";
}

// build the topping variable if it exists
if (isset($_POST['topping']))
{
	$topping = $_POST['topping'];
	$count = count($topping);
	$topps = ", ".$topping[0];
	$number_tops = $_POST['number'];

	// if the user selected too many toppings
	if($count > $number_tops)
	{
		header("Location: cart.php");
		exit();
	}
	else
	{
		for($i = 1; $i < $count; $i++)
		{
		  	$topps = $topps.", ".$topping[$i];
		}
	}
}
else
{
	$topps = "";
}

// build the key and add to cart superglobal
$key = $item.".".$size.".".$extras.".".$category.".".$topps.".".$pasta.".".$class;

$_SESSION["cart"][$key] = $_SESSION["cart"][$key] + $quantity;

header("Location: cart.php");

?>