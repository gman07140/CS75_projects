<?php require("header.php"); 
require("connect.php");
?>
  
<form action="adminlog.php" method="post">
    	<fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="adName" placeholder="Admin" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="adPassword" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Log In</button>
        </div>
    	</fieldset>
</form>
<div>
    or go to <a href="clientlog.php">client</a> to log in as client
</div>

<?php
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["adName"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["adPassword"]))
        {
            apologize("You must provide your password.");
        }

        // query database for user
        $rows = query("SELECT * FROM admins WHERE adName = ?", $_POST["adName"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if ($_POST["password"] == $row["adPassword"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["adminID"];

                // redirect to admin page
                header('Location: admintable2.php');
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }

require("footer.php");
?>
