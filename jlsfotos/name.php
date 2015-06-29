<?php
if (isset($_POST['pass']) === true && empty($_POST['pass']) === false) 
{
    require ('fconfig.php');
    $query = query("SELECT email FROM users WHERE password = ?", trim($_POST['pass']));
    $numrows = query("SELECT COUNT(email) AS CountofEmails FROM users WHERE password = ?", trim($_POST['pass']));
    
    //

    if ($numrows[0]["CountofEmails"] == 0)
    {
	echo "**Password does not exist!";
    }
    else
    {
	echo $query[0]['email'];
    }
}
?>
