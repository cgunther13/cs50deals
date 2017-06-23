<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["old"]))
        {
            apologize("You must provide your old password.");
        }
        else if (empty($_POST["new"]))
        {
            apologize("You must provide a new password.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["new"] != $_POST["confirmation"])
        {
            apologize("Those new passwords did not match.");
        }
        
        // ensure old password is correct
        $old = CS50::query("SELECT password FROM vendors WHERE id = ?", $_SESSION["id"]);

        if (!password_verify($_POST["old"], $old[0]["password"]))
        {
            apologize("Your old password is incorrect");
        }
        else
        {
            CS50::query("UPDATE vendors SET password = ?", password_hash($_POST["new"], PASSWORD_DEFAULT));
            render("vpassword_display.php");
        }
    }
    else
    {
        // else render form
        render("vpassword_form.php", ["title" => "Password"]);
    }

?>
