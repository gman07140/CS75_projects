<?php

    // configuration
    require("templates/adminheader.php");
    require("fconfig.php");

    // log out current user, if any
    logout();

    // redirect user
    redirect("adminlog.php");

require("footer.php"); 

?>