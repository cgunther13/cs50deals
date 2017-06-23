<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("preferences_form.php", ["title" => "Preferences"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // Make sure user checks only 1 box
        if (!isset($_POST['food']) && !isset($_POST['other']) && !isset($_POST['surprise']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if(isset($_POST['food']) && isset($_POST['other']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if(isset($_POST['food']) && isset($_POST['surprise']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if(isset($_POST['other']) && isset($_POST['surprise']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        
        // store user's preferences and welcome him/her to the site
        if(isset($_POST['food']))
        {
            CS50::query("UPDATE users SET preferences = '1' WHERE id = ?", $_SESSION["id"]); 
            welcome("some dope food deals");
        }
        else if(isset($_POST['other']))
        {
            CS50::query("UPDATE users SET preferences = '2' WHERE id = ?", $_SESSION["id"]); 
            welcome("some dope deals (that aren't food)");
        }
        else if(isset($_POST['surprise']))
        {
            if (rand(1, 2) == 1)
            {
                CS50::query("UPDATE users SET preferences = '1' WHERE id = ?", $_SESSION["id"]); 
            }
            else if (rand(1, 2) == 2)
            {
                CS50::query("UPDATE users SET preferences = '2' WHERE id = ?", $_SESSION["id"]); 
            }
            welcome("either food or other deals (cause you were too indecisive to pick)");
        }
    }
    
?>