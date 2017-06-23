<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
        {
            apologize("Those passwords did not match.");
        }
        
        // ensure phone number is a valid 10 digit number
        $length = strlen($_POST["number"]);
        if ($length !== 10)
        {
            apologize("Please enter your 10 digit phone number");
        }

        // try to register user
        $rows = CS50::query("INSERT IGNORE INTO users (username, password, number) VALUES(?, ?, ?)",
            $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["number"]
        );
        if ($rows !== 1)
        {
            apologize("That username or phone number appears to be taken.");
        }
        
        // get new user's ID
        $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
        if (count($rows) !== 1)
        {
            apologize("Can't find your ID.");
        }
        $id = $rows[0]["id"];

        // log user in
        $_SESSION["id"] = $id;

        // redirect to preferences page
        redirect("/preferences.php");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
