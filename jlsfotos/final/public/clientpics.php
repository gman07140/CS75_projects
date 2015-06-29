<?php

    // configuration
    require("../include/fconfig.php");

    $photos = [];
    
    $pics = query("SELECT imageid, link FROM images WHERE userid = ?", $_SESSION["userid"]);

    foreach ($pics as $pic)
    {
        $photos[] = [
        "link" => $pic["link"],
        "imageid" => $pic["imageid"]
        ];
    }
          
    crender("client_pics.php", ["photos" => $photos, "title" => "Client_Table"]);
?>
