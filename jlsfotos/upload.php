<?php
require("fconfig.php");

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
	            $full_name = "images/$file_name";
	            $upped = query("INSERT INTO images (userID, link) VALUES(?, ?)", $_SESSION["userid"], $full_name);
	            $count++; // Number of successfully uploaded files
	        }
	    }
	}
	redirect("adminpics2.php?action&userid=".$_SESSION["userid"]."");
}    
?>