<?php

    // configuration
    require("fconfig.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["pass"]))
        {
            echo "**Please create a password!";
        }
        else if (empty($_POST["confirm"]))
        {
            echo "**You must confirm the password";
        }
        else if ($_POST["confirm"] != $_POST["pass"])
        {
            echo "**Passwords do not match.";
        }
        else if (empty($_POST["email"]))
        {
            echo "**Please provide an email.";
        }
        
        // check if email already exists
        $numrows = query("SELECT COUNT(email) AS CountofEmails FROM users WHERE email = ?", $_POST['email']);

        if ($numrows[0]["CountofEmails"] != 0)
    	{
			echo "**Email already exists!";
	    }
	    else
	    {
			$sql = query("INSERT INTO users (username, password, email) VALUES(?, ?, ?)", $_POST["username"], crypt($_POST["pass"]), $_POST["email"]);
            echo '<meta http-equiv="refresh" content="0;URL=admintable2.php" />';
	    }
    }
    else
    {
        arender("newclient_form.php");
    }
?>