<div class="wrapper">
<h1>
    <?php   
    $named = query("SELECT username FROM users WHERE userID = ?", $_SESSION["userID"]);
    echo $named[0]["username"];
    ?>
    </h1>
</div>

<form name="form1" method="post" action="select.php">
    <div class="form-group">
        <input name="select" type="submit" id="select" value="Select">
    </div>
    <div id="container">
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="photos" href="/<?= $photo["link"]?>"$><img src=
                    "<?= $photo["link"]?>" width="200" height="120" alt=""/></a><input name="data[]" type="checkbox" id="
                    data" value="<?php echo $photo['link']; ?>"></li>
                <?php endforeach ?>
            </ul>
        </div>
        <hr>
    </div>
</form>
<script type="text/javascript" src="jquery.js"></script>
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