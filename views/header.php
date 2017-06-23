<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Deals: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Deals</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <h1 class="title">
                        C$50 Deals
                    </h1>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="today.php">Today's Deal</a></li>
                        <li><a href="preferences.php">Change Preferences</a></li>
                        <li><a href="vendors.php">Participating Vendors</a></li>
                        <li><a href="password.php">Change Password</a></li>
                        <li><a href="unsubscribe.php">Unsubscribe</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
