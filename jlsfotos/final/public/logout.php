<?php

    // configuration
    require("header.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("/clientlog.php");

require("footer.php"); 

?>
