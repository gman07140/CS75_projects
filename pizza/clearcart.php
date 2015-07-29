<?php
/*
	clearcart.php - removes all items from the users cart
*/
session_start();
unset($_SESSION["cart"]);
session_destroy();
header("Location: cart.php");
?>
