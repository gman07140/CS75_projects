<?php
    // configuration
    require("fconfig.php");

        // validate submission
        if (empty($_POST["email"]))
        {
            echo "**Please provide an email.";
        }
        else if (empty($_POST["pass"]))
        {
            echo "**Please create a password!";
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (hash_equals($row["password"], crypt($_POST["pass"], $row["password"])))
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["userID"] = $row["userID"];

                echo "Logged in!";
            }
        }

        // else apologize
        echo count($rows);
?>