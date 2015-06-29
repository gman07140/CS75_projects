<?php

    // configuration
    require("fconfig.php"); 

        // validate submission
        if (empty($_POST["adName"]))
        {
            echo "You must provide your admin name";
        }
        else if (empty($_POST["adPassword"]))
        {
            echo "You must provide your password";
        }

        // query database for user
        $rows = query("SELECT * FROM admins WHERE adName = ?", $_POST["adName"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if ($_POST["adPassword"] == $row["adPassword"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["adminID"] = $row["adminID"];

                // redirect to admin page
                echo '<meta http-equiv="refresh" content="0;URL=admintable2.php" />';
            }
        }
        // else apologize
        else
        {
            echo "Invalid name and/or password.";
        }

?>
