<?php
/*
	cart_remove.php - removes item from cart or updates item quantity
*/
session_start();

// get item detail from cart.php to build key
$item = $_POST["item"];
$size = $_POST["size"];
$extras = $_POST["extras"];
$quantity = $_POST["quantity"];
$category = $_POST["category"];
$pasta = $_POST["pasta"];
$toppings = $_POST["toppings"];
$class = $_POST["class"];

// validate the quantity...
if (isset($_POST["quantity"]) )
{
	$quantity = $_POST["quantity"];
	if($quantity < 0)
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
else
{
	header("Location: cart.php");
	exit();
}

$key = $item.".".$size.".".$extras.".".$category.".".$toppings.".".$pasta.".".$class;

// if update button was pressed...
if (isset($_POST['update'])) 
{
	if($quantity == 0)
	{
		unset($_SESSION["cart"][$key]);
		header("Location: cart.php");
		exit();
	}
    $_SESSION["cart"][$key] = 0;
    $_SESSION["cart"][$key] = $_SESSION["cart"][$key] + $quantity;
} 

// else if remove button was pressed...
else if (isset($_POST['remove'])) 
{
	unset($_SESSION["cart"][$key]);
} 

// refresh page after action
header("Location: cart.php");

?>