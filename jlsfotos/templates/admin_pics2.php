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

<form class="ajax" action="alert.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="email" id="email" type="hidden" value="<?php echo $address[0]['email'] ?>"/>
            <input autofocus class="form-control" name="username" id="username" type="hidden" value="<?php echo $address[0]['username'] ?>"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Alert Client</button>
            <div id="progress"></div>
        </div>
    </fieldset>
</form>

<form name="form3" method="post" action="deletepic.php">
    <div style="float:center;" class="form-group">
        <input name="deletepic" type="submit" id="deletepic" value="Remove">
    </div>
    <div id="container">
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="photos" href="/<?= $photo["link"]?>"$><img src=        
                              "<?= $photo["link"]?>" width="200" height="120" alt=""/></a><input name="data[]" type=
                              "checkbox" id="data" value="<?php echo $photo['imageID']; ?>"></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</form>

<script type="text/javascript" src="/java/alert2.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/java/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/java/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>