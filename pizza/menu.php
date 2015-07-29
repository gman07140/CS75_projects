<?php 
/*
	menu.php - main page.  Shows all categories and foods.  Pizza and pasta selections
	will go to an intermediary page before being submitted to the cart.
*/
require("menuheader.php");
$xml = new SimpleXMLElement("menu.xml", null, true); ?>

    <ul>
    <?php foreach ($xml->category as $category)  // display each category in a horizontal menu
	{
		$name = $category["name"]; 
		$displayname = str_replace("_"," ", $name); //replace underscores with spaces for display purposes ?>
		<li><a href="#" class="categories" name="<?php echo $name; ?>"><?php echo $displayname; ?></a></li>
	<?php } ?>
	</ul>

<?php foreach ($xml->category as $category)  // for each menu group - create div id equal to the category name
{
	$name = $category["name"]; 
	$displayname = str_replace("_"," ", $name);
	$remark = $category->remark;
	?>
	
	<div id="<?php echo $name; ?>" style="display:none;" class="every">
	<table>
		<thead>
		<tr>
			<th><?php echo $displayname; ?></th>
		</tr>
		</thead>

<?php
// special instructions for the pasta group. Show option box that will take user to pasta.php page upon selection
if($name == 'Pasta')
{?>
	<form action="pasta.php" method="post">
	<tr><td>
	<select name="pasta" id="pastas">
		<option selected="selected" value="0">Choose pasta</option>
		 	<?php foreach ($xml->xpath("category[@name = '$name']/choices/choice") as $choice)
		 	{?>
				<option name="pastachoice" value="<?= $choice ?>"><?= $choice ?></option>
		 	<?php } ?>
	</select>
	<input name="cat" value="<?php echo $name; ?>" type="hidden">
	<input name="quantity" value="1" type="hidden">
	</td>
	<td align="left"><input type="submit" value="select" align="left" id="pastasubmit"></td>
	</tr>
	</form>
<?php }

// for the non-pastas
else
{
	// if the menu group does not have different sizes
	if ($xml->xpath("category[@name = '$name']/item[price]"))
	{
		foreach ($xml->xpath("category[@name = '$name']/item") as $item)
	    {
			$food = $item["food"];
		    $sprice = $item->price;
		    $detail = $item->detail;
		    ?><tr><td><b><?php echo $food; ?></b></br><i><?php echo $detail; ?></i></td>
		    <td>$<?php echo $sprice; ?></td>
			<form action="addtocart.php" method="post">
	    	<input name="cat" value="<?php echo $name; ?>" type="hidden">
	    	<input name="item" type="hidden" value="<?php echo $food; ?>">
	    	<input name="quantity" value="1" type="hidden">
		    <input value="<?php echo $sprice; ?>" type="hidden">
		    <td align="left"><input type="submit" value="select" align="left" id="submit"></td>
	    	</tr>
	    	</form>

	    	<?php
	    }?><tr><td colspan="3"><?php echo $remark; ?></td></tr><?php
	}

	// else if the menu group does have different sizes
	else
	{	
		// for each item in the group
		foreach ($xml->xpath("category[@name = '$name']/item") as $item)
	    {
	    	$food = $item["food"];
	    	$detail = $item->detail;
	    	?><tr><td><b><?php echo $food; ?></b></br><i><?php echo $detail; ?></i></td><?php

	    	// each size in the item
	   		foreach($xml->xpath("category[@name = '$name']/item[@food = '$food']/sizes/size[price]") as $sz)
			{
				$size = $sz->type;
				$price = $sz->price;
				
				?><td align="right"><?php echo $size; ?>  -  $<?php echo $price; ?></td>
				<?php

				// special instructions for pizza group - will post to an intermidiary page before adding to cart
				if($name == 'Pizza')
				{
					?><form action="pizza.php" method="post"><?php
				}
				else
				{
					?><form action="addtocart.php" method="post"><?php
				}
				?>
					<input name="cat" value="<?php echo $name; ?>" type="hidden">
					<input name="quantity" value="1" type="hidden">
					<input name="item" value="<?php echo $food; ?>" type="hidden">
					<input name="size" value="<?php echo $size; ?>" type="hidden"><input value="<?php echo $price; ?>" type="hidden">
					<td align="right"><input type="submit" value="select" id="submit"></td>
				</form>
				
				<?php
			}
		}?></tr><tr><td colspan="3"><?php echo $remark; ?></td></tr><?php  // if exists add remark below the item
	}
}
    ?></br></table></div><?php }; ?>
<div id="bottom">
	<a href="cart.php">View cart</a>
</div>
<?php require("footer.php");?>