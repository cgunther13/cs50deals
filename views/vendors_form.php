<form action="vendors.php" method="post">
    <fieldset>
        <div>
            <p>
                Participating Vendors: 
            </p>
            <p>
                <?= htmlspecialchars($list) ?>
            </p>
        </div>
    </fieldset>
</form>