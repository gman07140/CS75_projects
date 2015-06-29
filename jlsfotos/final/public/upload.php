<?php

    // configuration
    require("../include/fconfig.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $file = $_FILES["image"]["tmp_name"];
        $file_name = $_FILES["image"]["name"];
        
        if(!isset($file))
            echo "please select an image";
        else
        {
            $file_name = $_FILES["image"]["name"];
        }  
    }    
     
    else
    {
        arender("clienthome_form.php", ["title" => "Upload"]);
    }
?>
