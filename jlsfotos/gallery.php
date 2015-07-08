<?php

    // configuration
    require("fconfig.php");

    $photos = [];
    
    $pics = query("SELECT DISTINCT link, imageID, cityid FROM images");

    foreach ($pics as $pic)
    {
        $photos[] = [
        "imageID" => $pic["imageID"],
        "link" => $pic["link"],
        "cityid" => $pic["cityid"]
        ];
    }

    $cities = [];

    $citys = query("SELECT cityid, city FROM cities");

    foreach ($citys as $city)
    {
        $cities[] = [
        "cityid" => $city["cityid"],
        "city" => $city["city"]
        ];
    }
          
    arender("gallery_form.php", ["photos" => $photos, "cities" => $cities, "title" => "Client_Pics"]);
?>