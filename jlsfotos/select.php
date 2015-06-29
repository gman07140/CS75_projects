<?php    
/** 
*source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
*/    
    
    // configuration
    require("fconfig.php");
    
    $address = query("SELECT email, username, userID FROM users WHERE userID = ?", $_SESSION["userID"]);
    
    $piclinks = [];

    // Check if select is active, declare
    if($_POST["select"])
    {
        $images = $_POST['data'];
    }
     
     crender("select_form.php", ["images" => $images, "address" => $address, "title" => "Confirmation"]);
?>
