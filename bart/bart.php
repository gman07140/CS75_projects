<?php

/**
 * bart.php - the only page the browser will navigate to.  Renders bart_form.php for display.
 * Creates an array of routes to populate the select box on bart_form.php.
 */ 

// require configuration page with functions
require("bart_config.php");

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

// renders html form
render("bart_form.php", ["routes" => $routes]);

?>