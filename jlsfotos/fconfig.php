<?php

    /**
     * config.php
     *
     * Computer Science 50
     *
     * Configures pages.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("testconn2.php");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match('/^\/clientlog*/', $_SERVER["PHP_SELF"]) && !preg_match('/^\/adminlog*/', $_SERVER["PHP_SELF"]) && !preg_match('/^\/newpass*/', $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["userID"]) && empty($_SESSION["adminID"]))
        {
            redirect("clientlog.php");
        }
    }

?>
