<script>
function myFunction() {
    location.reload();
}
</script>

<div class="wrapper">
<h1>
    <?php 
    $named = query("SELECT client FROM users WHERE userid = ?", $_SESSION["userid"]);
    echo $named[0]["client"];
    ?>
    </h1>
</div>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" multiple="multiple" name="image[]" type="file"/><?php echo str_repeat('&nbsp;', 4); ?>
            <button type="submit" class="btn btn-default">Upload</button>
        </div>
    </fieldset>
</form>

<form action="alert.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
            <input autofocus class="form-control" name="client" type="hidden" value="<?php echo $address[0]['client'] ?>"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Alert Client</button>
        </div>
    </fieldset>
</form>
        

<form name="form3" method="post" action="deletepic.php">
    <div style="float:center;" class="form-group">
        <input name="deletepic" type="submit" id="deletepic" value="Remove">
    </div>
    <div class="container">
        <div class="row">

                <?php foreach ($photos as $photo): ?>
                    <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="/<?= $photo["link"]?>"$><img class="img-responsive" src=        
                              "<?= $photo["link"]?>"
                              ></a>
                        <div>
                        <input name="data[]" type="checkbox" id="data" value="<?php echo $photo['link']; ?>">
                        </div>
                        </br>
                    </div>
                <?php endforeach ?>
        </div>
    </div>
</form>

<?php
$valid_formats = array("jpg", "png", "gif", "zip", "bmp", "JPG", "PNG");
$count = 0;

// Uploading multiple files. **source: http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	// Loop $_FILES to exeicute all files
	foreach ($_FILES["image"]["name"] as $f => $name) 
	{     
	    if ($_FILES["image"]["error"][$f] == 4) 
	    {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES["image"]["error"][$f] == 0) 
	    {	           
			if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) )
			{
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else
	        { // No error found! Upload files 
	            $file_name = $_FILES["image"]["name"][$f];
	            $full_name = "pics/$file_name";
	            $upped = query("INSERT INTO images (userid, link) VALUES(?, ?)", $_SESSION["userid"], $full_name);
	            $count++; // Number of successfully uploaded files
	        }
	    }
	}
	echo "<script> myFunction(); </script>";
}    
?>
