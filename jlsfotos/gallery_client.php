<?php

    // configuration
    require("testconn2.php");

    $photos = [];

    if (isset($_GET['categoryid']))
    {
        $catid = $_GET['categoryid'];
        $pics = query("SELECT gallerylink, title, galleryid, catname
                   FROM gallery, categories
                   WHERE category=? AND catid = category
                   GROUP BY gallerylink", $catid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "gallerylink" => $pic["gallerylink"],
            "catname" => $pic["catname"],
            "title" => $pic["title"]
            ];
        }
    }

    if (isset($_GET['cityid']))
    {
        $cityid = $_GET['cityid'];
        $pics = query("SELECT gallerylink, title, galleryid, city
                   FROM gallery, cities
                   WHERE gallery.cityid=? AND gallery.cityid = cities.cityid
                   GROUP BY gallerylink", $cityid);

        $count = count($pics);

        foreach ($pics as $pic)
        {
            $photos[] = [
            "galleryid" => $pic["galleryid"],
            "gallerylink" => $pic["gallerylink"],
            "city" => $pic["city"],
            "title" => $pic["title"]
            ];
        }
    }

    render("gallery_form_client.php", "header.php", ["photos" => $photos, "title" => "Gallery"]);
?>