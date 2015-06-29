<?php

    // configuration
    require("../include/fconfig.php");

    $clients = [];
    
    $rows = query("SELECT userid, client, email, comments FROM users");

    foreach ($rows as $row)
    {
        $clients[] = [
        "userid" => $row["userid"],
        "client" => $row["client"],
        "email" => $row["email"],
        "comments" => $row["comments"],
        ];
    }
          
    arender("admin_table.php", ["clients" => $clients, "title" => "Client_Table"]);
?>
