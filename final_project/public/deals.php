<?php

     /*
     * send an SMS using Twilio
     */
     
    // configuration
    require("../includes/config.php");
 
    // include the Twilio-PHP library from twilio.com/docs/libraries
    require "../twilio/Services/Twilio.php";
 
    // Set our AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "ACdba99bef9a1f7d161104eb1149b8f46c";
    $AuthToken = "8ec9765feaacd0b67f099a2b787c567a";
 
    // instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("deals_form.php", ["title" => "Deals"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // ensure deal is inputted
        if (empty($_POST["deal"]))
        {
            apologize("Please input your deal.");
        }
        
        // ensure vendor checks 1 and only 1 box
        if (!isset($_POST['food_deal']) && !isset($_POST['other_deal']))
        {
            apologize("You must check 1 and only 1 box.");
        }
        else if (isset($_POST['food_deal']) && isset($_POST['other_deal']))
        {
            apologize("You must check 1 and only 1 box.");
        }

        // make arrays of users from the SQL database, to send them a message
        $food_people = CS50::query("SELECT username, number FROM users WHERE preferences = '1'");
        $other_people = CS50::query("SELECT username, number FROM users WHERE preferences = '2'");
        
        // keep track of how many people the deal is texted to
        $counter = 0;
        
        // send personalized texts with the deal
        if (isset($_POST['food_deal']))
        {
            CS50::query("UPDATE vendors SET deal = ?, deal_type = '1' WHERE id = ?", $_POST["deal"], $_SESSION["id"]);
            
            // loop over all food users, sending them an sms text with their deal
            foreach ($food_people as $number) 
            {
                $sms = $client->account->messages->sendMessage(
                    
                    // 'From' number (our valid Twilio number) 
                    "305-680-1257", 
                    
                    // 'To' number
                    $number["number"],
         
                    // SMS body
                    "Hey " . $number["username"] . "! Here is today's food deal from C$50 Deals! " . $_POST["deal"]
                );
                $counter++;
            }
        }
        else if (isset($_POST['other_deal']))
        {
            CS50::query("UPDATE vendors SET deal = ?, deal_type = '2' WHERE id = ?", $_POST["deal"], $_SESSION["id"]);

            // loop over all other users, sending them an sms text with their deal
            foreach ($other_people as $number) 
            {
                $sms = $client->account->messages->sendMessage(
                    
                    // 'From' number (our valid Twilio number) 
                    "305-680-1257", 
         
                    // 'To' number
                    $number["number"],
         
                    // SMS body
                    "Hey " . $number["username"] . "! Here is today's other deal from C$50 Deals! " . $_POST["deal"]
                );
                $counter++;
            }
        }
        
        render("confirm.php", ["title" => "Sent", "deal" => $_POST["deal"], "counter" => $counter]);
    }
    
?>