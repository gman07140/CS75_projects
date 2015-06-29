<div class="wrapper">
<h1>
    <?php   
    $named = query("SELECT client FROM users WHERE userid = ?", $_SESSION["userid"]);
    echo $named[0]["client"];
    ?>
    </h1>
</div>

<form name="form1" method="post" action="select.php">
    <div class="form-group">
        <input name="select" type="submit" id="select" value="Select">
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
                        </br>
                     </div>
                <?php endforeach ?>
           
        </div>
        <hr>
    </div>
</form>
