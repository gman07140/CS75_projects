<?php

    // configuration
    require("../include/fconfig.php");

    $photos = [];
    
    $_SESSION["userid"] = $_GET["userid"];
    
    $pics = query("SELECT link FROM images WHERE userid = ?", $_SESSION["userid"]);
    
    $address = query("SELECT email, client FROM users WHERE userid = ?", $_SESSION["userid"]);

    foreach ($pics as $pic)
    {
        $photos[] = [
        "link" => $pic["link"],
        ];
    }
          
    arender("admin_pics.php", ["photos" => $photos, "address" => $address, "title" => "Client_Pics"]);
?>
