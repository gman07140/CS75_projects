<?php
/*
	cart.php - displays users cart
*/
require("menuheader.php"); 
$xml = new SimpleXMLElement("menu.xml", null, true); ?>

<ul><li><a href="clearcart.php">Clear Cart</a></li></ul>
</br>
<table>

<?php
$xml = new SimpleXMLElement("menu.xml", null, true);
session_start();

$cart = $_SESSION["cart"];
$keys = array_keys($cart);  //  returns everything in cart

if($cart)  // are there any items in cart
{
	?><thead><th align="left">Item</th><th>quantity</th><th align="right">price</th><th align="right">subtotal</th><th align="right">remove item</th></thead><?php
	$keys = array_keys($cart);  //  returns everything in cart
	foreach($keys as $key)
	{
		// separate key by "."
		$array = explode(".", $key);
		$name = $array[0];
		$size = $array[1];
		$extras = $array[2];
		$category = $array[3];
		$toppings = $array[4];
		$pasta = $array[5];
		$class = $array[6];

		$displaycat = str_replace("_"," ", $category);

		$quantity = $cart["$key"];
		$price=0;

		// prepare 'extra' for display
		if($xml->xpath("category[@name = '$category']/extras[@extra = '$extras']/sizes/size[type = '$size']/price"))
		{
			$exxtra = $xml->xpath("category[@name = '$category']/extras[@extra = '$extras']/sizes/size[type = '$size']/price");
			$extraname = " with ".$extras;
		}
		else
		{
			$exxtra = 0;
			$extraname = "";
		}

		// look up price for pasta
		if ($category == "Pasta")
		{
			if ($class == 1)
			{
				$price = $xml->xpath("category[@name = '$category']/item[@food = '$name']/price");
				$newsize = "";
			}
			else if ($class == 2)
			{
				$price = $xml->xpath("category[@name = '$category']/item[@food = '$name']/price2");
				$newsize = "";
			}
		}
		else
		{	
			// look up price for items without sizes
			if ($xml->xpath("category[@name = '$category']/item[@food = '$name']/price"))
			{
				$price = $xml->xpath("category[@name = '$category']/item[@food = '$name']/price");
				$newsize = "";
			}
			// look up prices for items with various sizes
			else
			{
				$price = $xml->xpath("category[@name = '$category']/item[@food = '$name']/sizes/size[type = '$size']/price");
				$newsize = $size." - ";
			}
		}	

		

		$ext = (float) $exxtra[0];
		$price2 = (float) $price[0];

		$unitPrice = (float) ($ext + $price2);
		$itemSubtotal = $unitPrice * $quantity;

		$total = $total + $itemSubtotal;
		
		?>
		<tr>
			<form action="cart_remove.php" method="post" class="form5">
			<td><?php echo $displaycat." - ".$newsize.$pasta.$name.$toppings.$extraname; ?></td>
			<td style="padding-right:3px;" align="center"><input size="1" class="quantity" name="quantity" style="text-align:right;" value="<?php echo $quantity; ?>">
			  <input type="submit" name="update" value="update" align="left" class="update"></td>
			<td align="right">$<?php printf("%0.2f", $unitPrice); ?></td>
			<td align="right">$<?php printf("%0.2f", $itemSubtotal); ?></td>

			<input name="pasta" type="hidden" value="<?php echo $pasta; ?>">
			<input name="class" type="hidden" value="<?php echo $class; ?>">
			<input name="toppings" type="hidden" value="<?php echo $toppings; ?>">
			<input name="category" type="hidden" value="<?php echo $category; ?>">
			<input name="extras" type="hidden" value="<?php echo $extras; ?>">
			<input name="item" type="hidden" value="<?php echo $name; ?>">
			<input name="size" type="hidden" value="<?php echo $size; ?>">
			<td align="left"><input type="submit" name="remove" value="remove" align="left"></td>
			</form>
		</tr>

		<?php
	}
	$_SESSION["total"] = $total;
	?>
	<tr>
		<td colspan="1" align="left"><b>Total:</b></td>
		<td colspan="3" align="right"><b>$<?php printf("%0.2f", $total); ?></b></td>
	</tr>
	<tr><td colspan="5" align="center"><a class="checkout" href="checkout.php">checkout</a></td></tr>
<?php
}
else
{
	?><h2><?php echo "Your cart is empty!"; ?></h2><?php
}
?></table>
<ul>
	<li><a href="menu.php">menu</a></li>
</ul>
<?php require("footer.php");?>