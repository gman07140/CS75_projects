<?php

    // configuration
    require("templates/adminheader.php");
    require("fconfig.php");

    // log out current user, if any
    logout();

    // redirect user
    redirect("adlogin.php");

require("footer.php"); 

?>