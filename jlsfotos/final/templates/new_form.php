</br>
<form action="newclient.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="client" placeholder="Client name" type="text"/>
            <?php echo str_repeat('&nbsp;', 7); ?>
            <input class="form-control" name="email" placeholder="Email" type="text"/>            
        </div>
        <div class="form-group">
            <input class="form-control" name="comments" placeholder="Comments" type="comm"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>
    </fieldset>
</form>


