<?php

    /**
     * helpers.php
     *
     * Computer Science 50
     * Final Project
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

    /**
     * Welcomes the user to the site with a customized message
     * (based on their preferences).
     */
    function welcome($message)
    {
        render("welcome.php", ["title" => "Welcome", "message" => $message]);
    }

    /**
     * Prints today's deal to the user, customized to their preferences.
     */
    function today($type, $deal)
    {
        render("today_display.php", ["title" => "Today's Deal", "type" => $type, "deal" => $deal]);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            if ($view == "deals_form.php" || $view == "confirm.php" ||
            $view == "vpassword_form.php" || $view == "vpassword_display.php")
            {
                // render vendor header and footer views
                require("../views/vendor_header.php");
                require("../views/{$view}");
                require("../views/footer.php");
            }

            else if ($view == "preferences_form.php" || $view == "password_form.php" ||
            $view == "password_display.php" || $view == "today_form.php" ||
            $view == "today_display.php" || $view == "welcome.php" ||
            $view == "vendors_form.php" || $view == "unsubscribe_form.php")
            {
                // render user header and footer views
                require("../views/header.php");
                require("../views/{$view}");
                require("../views/footer.php");
            }

            else if ($view == "login_form.php" || $view == "vlogin_form.php"
            || $view == "register_form.php" || "vregister_form.php")
            {
                // render user header and footer views
                require("../views/login_header.php");
                require("../views/{$view}");
                require("../views/footer.php");
            }
        exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

?>
