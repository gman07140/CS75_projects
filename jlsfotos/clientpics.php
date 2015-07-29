<?php

    // configuration
    require("fconfig.php");

    $photos = [];
    
    $pics = query("SELECT imageid, link FROM images WHERE userID = ?", $_SESSION["userID"]);

    foreach ($pics as $pic)
    {
        $photos[] = [
        "link" => $pic["link"],
        "imageid" => $pic["imageid"]
        ];
    }
          
    render("client_pics.php", "clientheader.php", ["photos" => $photos, "title" => "Client_Table"]);
?>
