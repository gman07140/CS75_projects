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
          
    clrender("client_pics.php", ["photos" => $photos, "title" => "Client_Table"]);
?>
