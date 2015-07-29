<?php
/*
	checkout.php - shows total and thanks user
*/
require("menuheader.php"); 
session_start();

$total = $_SESSION["total"];

?>
<h1>Your total is: $<?php printf("%0.2f", $total); ?></h1>
<h2>Three Aces thanks you for your business!</h2>
<?php require("footer.php");?>