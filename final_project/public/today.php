<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("today_form.php", ["title" => "Today's Deal"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // ensure user checks only 1 box
        if (!isset($_POST['food']) && !isset($_POST['other']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if(isset($_POST['food']) && isset($_POST['other']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        
        // get deals and the number of deals from the vendors SQL table
        $food_deal = CS50::query("SELECT deal FROM vendors WHERE deal_type = '1'");
        $other_deal = CS50::query("SELECT deal FROM vendors WHERE deal_type = '2'");
        $food_count = count($food_deal);
        $other_count = count($other_deal);

        // create string to pass to today_display
        $deals = "";
        
        // show appropraite deals
        if(isset($_POST['food']))
        {
            // if no current food deals
            if (empty($food_deal[0]["deal"]))
            {
               today("food", "No current food deals. Check back later."); 
            }
            else
            {
                // update deals string with a comma separated list all food deals
                for ($i = 0; $i < ($food_count - 1); $i++)
                {
                    $deals = $deals . $food_deal[$i]["deal"] . ", ";
                }
                $deals = $deals . $food_deal[$food_count - 1]["deal"];
                today("food", $deals);
            }
        }
        else if(isset($_POST['other']))
        {
            // if no current other deals
            if (empty($other_deal[0]["deal"]))
            {
               today("other", "No current other deals. Check back later."); 
            }
            else
            {
                // update deals string with a comma separated list of all other deals
                for ($i = 0; $i < ($other_count - 1); $i++)
                {
                    $deals = $deals . $other_deal[$i]["deal"] . ", ";
                }
                $deals = $deals . $other_deal[$other_count - 1]["deal"];
                today("other", $deals);
            }
        }
    }
    
?>