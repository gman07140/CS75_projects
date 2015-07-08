<?php
    // configuration
    require("fconfig.php");

    $id = $_GET["userid"];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["pass"]))
        {
            echo "**Please create a password";
        }
        else if (empty($_POST["confirm"]))
        {
            echo "**Please confirm your password";
        }
        else if ($_POST["confirm"] != $_POST["pass"])
        {
            echo "**Passwords do not match.";
        }
        else
        {
            // update the password to the users submission
            $rows = query("UPDATE users SET password =? WHERE userID =?", crypt($_POST["pass"]), $id);
            echo "Password successfully changed!";
        }
    }
    else
    {
        crender("newpass_form.php");
    }
?>