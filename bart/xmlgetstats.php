<?php
    // configuration
    require("testconn3.php");

    $sql = query("SELECT name, stations.abbr, lat, lng, color FROM (SELECT routedets.rnumber, color, abbr FROM routedets, routes WHERE routedets.rnumber = routes.rnumber) AS rout, stations WHERE rout.abbr = stations.abbr AND rnumber=?", $_POST['data']);
    
    echo json_encode($sql);
?>