<?php 
/*
	pizza.php - new page for when user selects a pizza from menu.  User will decide if he/she wants
	any extras and will select toppings in the case of a combo.
*/
require("menuheader.php");
$xml = new SimpleXMLElement("menu.xml", null, true); 

	$name = $_POST["item"];
	$size = $_POST["size"];
	$category = $_POST["cat"];
	$quantity = $_POST["quantity"];
?>

<table>
	<thead><th align="left">Item</th><th>quantity</th><th align="right">price</th><th align="right">total</th></thead><?php

	// get item price based on posted data
	$price = $xml->xpath("category/item[@food = '$name']/sizes/size[type = '$size']/price");

	$unitPrice = (float) $price[0]; 
	$total = $unitPrice * $quantity;

	?>
	<tr>
		<form action="addtocart.php" method="post" id="myForm">
		<td><b><?php echo $category." - ".$name.", ".$size; ?></b></td>
		<td align="center"><input size="1" name="quantity" id="quantity" style="text-align:right;" value="<?php echo $quantity; ?>"></td>
		<td align="right">$<?php printf("%0.2f", $unitPrice); ?></td>
		<td align="right">$<?php printf("%0.2f", $total); ?></td>

		<input name="item" type="hidden" value="<?php echo $name; ?>">
		<input name="size" type="hidden" value="<?php echo $size; ?>">
		<input name="cat" type="hidden" value="<?php echo $category; ?>">
	</tr>

<?php

// get each extra
foreach ($xml->xpath("category[@name = '$category']/extras") as $ex)
{ 
	$extra = $ex["extra"];
	$cost = $xml->xpath("category[@name = '$category']/extras/sizes/size[type = '$size']/price");
	?>
	<tr>
		<td colspan="4" align="center"><b><?php echo "Add ".$extra." for $".$cost[0]."?"; ?></b><input name="extras" value="<?php echo $extra; ?>" type="checkbox" id="extras"></td>
	</tr>
<?php } ?>

<?php

// figure out if the pizza was a combo
if (substr($name, -5) == 'combo')
{
	// find out how many toppings the user is allowed
	$options = $xml->xpath("category/item[@food = '$name']/options");

	// create the header showing # of toppings
	?><div id="num"><?php echo $options[0]?></div>
	<tr><td colspan="4" align="center"><h2><?php echo "Choose ".$options[0]." toppings from the list";?></h2></br>
	<input type="hidden" name="number" value="<?php echo $options[0]; ?>"<?php

	// get each topping from the xml file and list them with checkboxes
	foreach ($xml->xpath("category/toppings/topping") as $topping)
	{ 
		?>
		<b style="padding-left:10px;"><?php echo $topping; ?></b><input class="topping" name="topping[]" value="<?php echo $topping; ?>" type="checkbox">
		<?php } ?>
		</td></tr>
<?php } ?>
	<tr>
		<td align="center" colspan="4"><input type="submit" value="add to cart" align="left" id="submit"></td>
	</tr>
</form>
</table>

<div id="bottom">
<ul><li><a href="menu.php">menu</a></li></ul>
</div>

<?php require("footer.php");?>