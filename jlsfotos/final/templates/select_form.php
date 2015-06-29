<form action="send.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
        </div>
        <div class="col-xs-12">
            <input class="form-control input-lg" name="requests" type="text" placeholder="Special requests">
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="client" type="hidden" value="<?php echo $address[0]['username'] ?>"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="userid" type="hidden" value="<?php echo $address[0]['userID'] ?>"/>
        </div>
        <div>
            <input name="pics" type="hidden" value="<?php foreach ($images as $image): ?><?php echo $image; ?>,  <?php endforeach ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Send</button>
        </div>
    </fieldset>
</form>
        
<div class="wrapper">
    <h1>Click send to confirm your order!</h1>
</div>
<?php foreach ($images as $image): ?>
        <img src=        
              "<?= $image?>"
              width="auto" height="100">
<?php endforeach ?>
<div>
    or go to <a href="clientpics.php">previous page</a> to resubmit
</div>
