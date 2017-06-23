// <?php

//      // configuration
//     require("../includes/config.php");

//      // if form was submitted
//     if ($_SERVER["REQUEST_METHOD"] == "POST")
//     {
//          // validate inputs
//         if (empty($_POST["name"]))
//         {
//             apologize("You must provide your company name.");
//         }
//         else if (empty($_POST["username"]))
//         {
//             apologize("You must provide a username.");
//         }
//         else if (empty($_POST["password"]))
//         {
//             apologize("You must provide a password.");
//         }
//         else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
//         {
//             apologize("Those passwords did not match.");
//         }

//          // try to register user
//         $rows = CS50::query("INSERT IGNORE INTO vendors (name, username, password) VALUES(?, ?, ?)",
//             $_POST["name"], $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)
//         );
//         if ($rows !== 1)
//         {
//             apologize("That username appears to be taken.");
//         }

//          // get new user's ID
//         $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
//         if (count($rows) !== 1)
//         {
//             apologize("Can't find your ID.");
//         }
//         $id = $rows[0]["id"];

//          // log user in
//         $_SESSION["id"] = $id;

//          // redirect to deals page
//         redirect("/deals.php");
//     }
//     else
//     {
//          // else render form
//         render("vregister_form.php", ["title" => "Register"]);
//     }

// ?>
