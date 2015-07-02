<?php    
/** 
*source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
*/    
    // configuration
require("fconfig.php");

    $address = query("SELECT email, username, userID FROM users WHERE userID = ?", $_SESSION["userID"]);

    if (!empty($_POST['data']))
    {
        $images = $_POST['data'];
    }
    else
    {
        exit();
        return false;
    }
    clrender("select_form.php", ["images" => $images, "address" => $address, "title" => "Confirmation"]);
?>
