<?php

    // configuration
    require("fconfig.php");

    $photos = [];
    
    $pics = query("SELECT gallerylink, cityid, title, galleryid
    			   FROM gallery
    			   GROUP BY gallerylink");

    $count = count($pics);

    foreach ($pics as $pic)
    {
        $photos[] = [
        "galleryid" => $pic["galleryid"],
        "gallerylink" => $pic["gallerylink"],
        "cityid" => $pic["cityid"],
        "title" => $pic["title"]
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
          
    render("gallery_form.php", "adminheader.php", ["photos" => $photos, "cities" => $cities, "title" => "Client_Pics"]);
?>