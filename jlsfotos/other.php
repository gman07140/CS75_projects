<?php 

require("testconn2.php");

if (empty($_SESSION["userID"]))
        {
            redirect("clientlogin.php");
        }

 ?>