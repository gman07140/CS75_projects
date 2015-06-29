<?php

    // configuration
    require("fconfig.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["adName"]))
        {
            echo "You must provide your username.";
	    crender("adlogin_form.php", ["title" => "Log In"]);
	    exit();
        }
        else if (empty($_POST["adPassword"]))
        {
            echo "You must provide your password.";
	    crender("adlogin_form.php", ["title" => "Log In"]);
	    exit();
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
                $_SESSION["id"] = $row["adminID"];

                // redirect to admin page
                redirect("/admintable.php");
            }
        }

        // else apologize
        echo "Invalid username and/or password.";
	crender("adlogin_form.php", ["title" => "Log In"]);
	exit();
    }
    else
    {
        // else render form
        crender("adlogin_form.php", ["title" => "Log In"]);
    }

?>
