<?php

    // configuration
    require("fconfig.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            apologize("Please provide an email.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("Please create a password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm the password.");
        }
        else if ($_POST["confirmation"] != $_POST["password"])
        {
            apologize("Passwords do not match.");
        }
        
        // check if email already exists
        $results = query("INSERT INTO users (client, email, password, comments) VALUES(?, ?, ?, ?)", $_POST["client"], $_POST["email"], crypt($_POST["password"]), $_POST["comments"]);
        if($results === false)
        {
            apologize("Email already exists.");
        }

        redirect("/admintable.php");
    }
    else
    {
        // else render form
        arender("new_form.php", ["title" => "New"]);
    }
?>
