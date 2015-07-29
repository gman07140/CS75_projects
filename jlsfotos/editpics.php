<?php

    // configuration
    require("fconfig.php");
    
    $pic = $_GET["galleryid"];
    
    $picinfo = query("SELECT gallerylink, galleryid, gallery.cityid AS cityid, city, title, descript, category, catid, catname
                    FROM gallery, cities, categories
                    WHERE gallery.cityid = cities.cityid AND category = catid AND galleryid = ?", $pic);

    $cities = [];

    $citys = query("SELECT cityid, city FROM cities WHERE cityid <> ?", $picinfo[0]['cityid']);

    foreach ($citys as $city)
    {
        $cities[] = [
        "cityid" => $city["cityid"],
        "city" => $city["city"]
        ];
    }

    $categories = [];

    $cats = query("SELECT catid, catname FROM categories WHERE catid <> ?", $picinfo[0]['category']);

    foreach ($cats as $cat)
    {
        $categories[] = [
        "catid" => $cat["catid"],
        "catname" => $cat["catname"]
        ];
    }

    render("editpics_form.php", "adminheader.php", ["picinfo" => $picinfo, "cities" => $cities, "categories" => $categories, "title" => "Edit"]);
?>