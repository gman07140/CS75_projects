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
	            $full_name = "gallery/$file_name";
	            $numrows = query("SELECT gallerylink FROM gallery WHERE gallerylink= ?", $full_name);
	            $num = count($numrows);
	            if($num == 0)
	            {
	            	$upped = query("INSERT INTO gallery (gallerylink) VALUES(?)", $full_name);
		            $count++; // Number of successfully uploaded files
	            }
	            else
	            {
	            	$message[] = "$name is not a valid format";
					continue; // Skip invalid file formats
	            }
	        }
	    }
	}
	redirect("gallery.php");
}    
?>