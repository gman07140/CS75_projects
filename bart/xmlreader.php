<?php
// load static xml data into SQL database

require("testconn3.php");

    $routes = [];
    
    $rows = query("SELECT rnumber, color, routename FROM routes");

    foreach ($rows as $row)
    {
        $routes[] = [
        "rnumber" => $row["rnumber"],
        "color" => $row["color"],
        "routename" => $row["routename"]
        ];
    }    
arender("xmlreader_form.php", ["routes" => $routes]);

?>