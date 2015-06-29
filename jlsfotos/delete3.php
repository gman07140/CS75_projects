<?php
    
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("fconfig.php");

    // Check if delete button active, start this 
        $id = $_POST['data'];
        $count = count($id);
        for($i = 0; $i < $count; $i++)
        {
            //echo "<br> value = ".$id[$i]."Jumlah = ".$count ;
            $numrows = query("SELECT COUNT(email) AS CountofEmails FROM users WHERE userID='$id[$i]'");
            $sql = query("DELETE FROM users WHERE userID='$id[$i]'");
        }
        
    // if successful refresh page
    if ($numrows[0]["CountofEmails"] != 0)
    {
        echo '<meta http-equiv="refresh" content="0;URL=admintable2.php" />';
    }
?>
