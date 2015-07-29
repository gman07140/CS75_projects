<?php
    
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("fconfig.php");

    $title = $_POST['title'];
    $city = $_POST['origin'];
    $descr = $_POST['descr'];
    $pic = $_POST['pic'];
    $cat = $_POST['cat'];

    $sql = query("UPDATE gallery SET title=?, cityid=?, descript=?, category=? WHERE galleryid=?", $title, $city, $descr, $cat, $pic);

    if($sql === false)
    {
        echo "changes saved!";
    }
    else
    {
        echo "failed to update!";
    }
?>