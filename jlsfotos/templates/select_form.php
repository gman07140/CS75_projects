<form class="ajax" method="post" action="send.php">
    <fieldset>
            <input id="email" name="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
            <input id="username" name="username" type="hidden" value="<?php echo $address[0]['username'] ?>"/>
            <input id="userID" name="userID" type="hidden" value="<?php echo $address[0]['userID'] ?>"/>
            <input id="pics" name="pics" type="hidden" value="<?php foreach ($images as $image): ?><?php echo $image; ?>,  <?php endforeach ?>">
        <div class="col-xs-12">
            <input class="form-control input-lg" id="requests" name="requests" type="text" placeholder="Special requests">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Send</button>
            <div id="progress"></div>
        </div>
    </fieldset>
</form>
        
<div class="wrapper">
    <h1>Review your selection below. Click send when ready.</h1>
</div>
<?php foreach ($images as $image): ?>
        <img src=        
              "<?= $image?>"
              width="auto" height="100">
<?php endforeach ?>
<div>
    or go to <a href="clientpics.php">previous page</a> to resubmit
</div>
<script type="text/javascript" src="java/alert2.js"></script>