<?php 
/*
	pasts.php - new page for when user selects a pasta from menu. Page will
	display prices for the particular selection
*/
require("menuheader.php");
$xml = new SimpleXMLElement("menu.xml", null, true); 

// if the user did not enter a pasta
	if(isset($_POST["pasta"]))
	{
		if(is_numeric($_POST["pasta"]))
		{
			header("Location: menu.php");
			exit;
		}
	}

	$category = $_POST["cat"];
	$pasta = $_POST["pasta"];
	$quantity = $_POST["quantity"];
	$remark = $xml->xpath("category[@name = '$category']/remark");
	$choice = $xml->xpath("category/choices[choice = '$pasta']");
	$class = $choice[0]["class"];
?>

<div id="middle">

<table>
<thead>
	<tr>
	<th><?php echo $pasta; ?></th>
	<th>quantity</th>
	<th>price</th>
	<th>add</th>
	</tr>
</thead>
<tr>
	<td align="center" colspan="2" id="item"></td>
</tr>
<?php
	// figure out which prices to use based on item class
	if($class == 1) {$prico = "price";} else{$prico = "price2";}

	// list each item with cooresponding price
	foreach ($xml->xpath("category[@name = '$category']/item") as $item)
	{
		$food = $item["food"];
	    $price = $item->$prico;
	    ?>
	    <form action="addtocart.php" method="post">
	    <tr>
	    	<td alight="left"><?php echo $food; ?></td>
	    	<td align="center"><input size="1" name="quantity" style="text-align:right;" value="<?php echo $quantity; ?>"></td>
	    	<td align="right"><?php echo $price; ?></td>
	    	<td align="right"><input type="submit" value="add to cart" align="left" id="submit"></td>
	    </tr>
	    	<input name="pasta" type="hidden" value="<?php echo $pasta; ?>">
	    	<input name="class" type="hidden" value="<?php echo $class; ?>">
	    	<input name="item" type="hidden" value="<?php echo $food; ?>">		
			<input name="cat" type="hidden" value="<?php echo $category; ?>">
		</form>
	    <?php
	}
?>
<tr>
	<td align="left" colspan="2"><?php echo $remark[0]; ?></td>
</tr>
</table>
</form>
</div>

<div id="bottom">
<ul><li><a href="menu.php">menu</a></li></ul>
</div>
<?php require("footer.php");?>