<?php

/**
* bartgetstats.php - Takes route selection from main page (bart.php), queries the database and returns 
* the stations and color code relevant to the selected route.
*/ 

    // configuration
    require("bart_config.php");

    $sql = query("SELECT name, stations.abbr, lat, lng, color 
    			  FROM (SELECT routedets.rnumber, color, abbr 
    			  	    FROM routedets, routes 
    			  	    WHERE routedets.rnumber = routes.rnumber) AS rout, stations 
    			  WHERE rout.abbr = stations.abbr AND rnumber=?", $_POST['data']);
    
    echo json_encode($sql);
?>