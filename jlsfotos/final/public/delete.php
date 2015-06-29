<?php
    
    /** 
    *source - <https://www.daniweb.com/web-development/php/threads/101713/delete-multiple-rows-in-mysql-with-check-box> 
    */
        
    // configuration
    require("../include/fconfig.php");

    // Check if delete button active, start this 
    if($_POST['delete'])
    {
        $id = $_POST['data'];
        $count = count($id);
        for($i = 0; $i < $count; $i++)
        {
            //echo "<br> value = ".$id[$i]."Jumlah = ".$count ;
            $sql = query("DELETE FROM users WHERE userid='$id[$i]'");
        }
     }   
     // if successful refresh page
     if($sql !== false)
     {
        redirect("/admintable.php");
     } 
?>
