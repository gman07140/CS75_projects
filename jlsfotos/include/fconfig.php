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
    require("fconstants.php");
    require("ffunctions.php");
    require("connect.php");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match("{(?:adminlog|clientlog|)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("clientlog.php");
        }
    }

?>
