<?php

    /**
     * config.php
     *
     * Computer Science 50
     * Final Project
     *
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");

    // CS50 Library
    require("../vendor1/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../config.json");

    // enable sessions
    session_start();

    // require authentication for all pages except login, register, and logout pages
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/vendor_login.php", "/logout.php", "/register.php", "/vendor_register.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }

?>
