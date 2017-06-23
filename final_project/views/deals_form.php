<form action="deals.php" method="post">
    <fieldset>
        <div>
            What's today's deal?
        </div>
        <div>
            Make sure to include your company name with the deal
        </div>
        <br>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="deal" placeholder="Today's deal" type="text"/> <br>
            <br>
            <input type="checkbox" name="food_deal"/> Food<br>
            <input type="checkbox" name="other_deal"/> Other<br>
            <br>
            <input type="submit" value="Send me customers!"/>
        </div>
        <br>
        <div class="fineprint">
            *By checking this box, you agree to give the above deal to 
            customers who show the text deal on their phone.
        </div>
        <br>
    </fieldset>
</form>