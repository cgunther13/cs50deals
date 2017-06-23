<?php

     // configuration
    require("../includes/config.php");

    // get vendors' names and number of vendors from the vendors SQL table
    $vendors = CS50::query("SELECT name FROM vendors");
    $count = count($vendors);

    // create comma separated list of all vendors to pass to vendors form
    $list = "";
    for ($i = 0; $i < ($count - 1); $i++)
    {
        $list = $list . $vendors[$i]["name"] . ", ";
    }
    $list = $list . $vendors[$count - 1]["name"];
    
    // else render form
    render("vendors_form.php", ["title" => "Vendors", "list" => $list]);

?>