<?php
    // configuration
    require("fconfig.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            echo "**Please provide an email";
        }
        else if (empty($_POST["pass"]))
        {
            echo "**Please provide a password";
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["pass"], $row["password"]) == $row["password"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["userID"] = $row["userID"];
                echo '<meta http-equiv="refresh" content="0;URL=clientpics.php" />';
            }
            else
            {
                echo "password incorrect";
            }
        }
        // else print error
        else
        {
        echo "email not found";
        }
    }
    else
    {
        crender("clientlogin_form.php");
    }
?>