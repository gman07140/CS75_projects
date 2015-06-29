<script>
function myFunction() {
    location.reload();
}
</script>

<div class="wrapper">
<h1>
    <?php 
    $named = query("SELECT username FROM users WHERE userID = ?", $_SESSION["userid"]);
    echo $named[0]["username"];
    ?>
    </h1>
</div>

<form action="upload.php?>" method="post" name="myForm" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" multiple="multiple" name="image[]" type="file"/><?php echo str_repeat('&nbsp;', 4); ?>
            <button type="submit" class="btn btn-default">Upload</button>
        </div>
    </fieldset>
</form>

<form action="alert.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
            <input autofocus class="form-control" name="client" type="hidden" value="<?php echo $address[0]['username'] ?>"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Alert Client</button>
        </div>
    </fieldset>
</form>
        

<form name="form3" method="post" action="deletepic.php">
    <div style="float:center;" class="form-group">
        <input name="deletepic" type="submit" id="deletepic" value="Remove">
    </div>
    <div class="container">
        <div class="row">

                <?php foreach ($photos as $photo): ?>
                    <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="/<?= $photo["link"]?>"$><img class="img-responsive" src=        
                              "<?= $photo["link"]?>"
                              ></a>
                        <div>
                        <input name="data[]" type="checkbox" id="data" value="<?php echo $photo['link']; ?>">
                        </div>
                        </br>
                    </div>
                <?php endforeach ?>
        </div>
    </div>
</form>