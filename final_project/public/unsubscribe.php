<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("unsubscribe_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // ensure user checks 1 and only 1 box
        if (!isset($_POST['yes']) && !isset($_POST['no']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if (isset($_POST['yes']) && isset($_POST['no']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        
        // validate submission
        if (isset($_POST["yes"]))
        {
            CS50::query("DELETE FROM users WHERE id = ?", $_SESSION["id"]);
            redirect("register.php");
        }
        else if (isset($_POST["no"]))
        {
            redirect("today.php");
        }
    }

?>
