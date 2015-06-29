<?php    
/** 
*source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
*/    
    
    // configuration
    require("../include/fconfig.php");
    
    $address = query("SELECT email, client, userid FROM users WHERE userid = ?", $_SESSION["userid"]);
    
    $piclinks = [];

    // Check if select is active, declare
    if($_POST["select"])
    {
        $images = $_POST['data'];
    }
     
     crender("select_form.php", ["images" => $images, "address" => $address, "title" => "Confirmation"]);
?>
