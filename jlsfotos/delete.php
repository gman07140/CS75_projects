<?php
    
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("fconfig.php");

    //$nd variable passed from delete2.js
    $nd = $_POST['arry'];

    	if (empty($nd))
    	{
    		exit();
    	}
    	else
    	{
	        $count = count($nd);
	        for($i = 0; $i < $count; $i++)
	        {
	            //echo "<br> value = ".$id[$i]."Jumlah = ".$count ;
	            $numrows = query("SELECT COUNT(email) AS CountofEmails FROM users WHERE userID='$nd[$i]'");
	            $sql = query("DELETE FROM users WHERE userID='$nd[$i]'");
	        }
    	}

        // if successful refresh page
        if ($numrows[0]["CountofEmails"] != 0)
        {
            echo 'goodjob';
        }
?>