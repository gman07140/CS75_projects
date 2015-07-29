<?php

    // configuration
    require("fconfig.php");

    $photos = [];
    
    $_SESSION["userid"] = $_GET["userid"];
    
    $pics = query("SELECT link, imageID FROM images WHERE userID = ?", $_SESSION["userid"]);

    $address = query("SELECT email, username FROM users WHERE userID = ?", $_SESSION["userid"]);

    foreach ($pics as $pic)
    {
        $photos[] = [
        "link" => $pic["link"],
        "imageID" => $pic["imageID"]
        ];
    }
          
    render("admin_pics2.php", "adminheader.php", ["photos" => $photos, "address" => $address, "title" => "Client_Pics"]);
?>