<?php
    // configuration
    require("fconfig.php");

    $clients = [];
    
    $rows = query("SELECT userID, username, email, comments FROM users");

    foreach ($rows as $row)
    {
        $clients[] = [
        "userID" => $row["userID"],
        "username" => $row["username"],
        "email" => $row["email"],
        "comments" => $row["comments"],
        ];
    }
          
    render("admin_table2.php", "adminheader.php", ["clients" => $clients, "title" => "Client_Table"]);
?>
