<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class ="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        <div class="form-group">
            <input class ="form-control" name="number" placeholder="Phone Number" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    <p>
        or <a href="login.php">log in</a>
    </p>
    <p>
        Vendors <a href="vendor_login.php">sign in</a> 
        <!--or <a href="vendor_register.php">register</a> here-->
    </p>
</div>
