<div class="form-group">
  <input type="submit" id="show" value="Edit Gallery">
</div>

<form action="uploadgal.php" method="post" name="myForm" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" multiple="multiple" name="image[]" type="file"/><?php echo str_repeat('&nbsp;', 4); ?>
            <button type="submit" class="btn btn-default">Upload</button>
        </div>
    </fieldset>
</form>

<form name="form3" method="post" action="deletegal.php">
    <div style="float:center;" class="form-group" id="remove">
        <input name="deletepic" type="submit" id="deletepic" value="Remove">
    </div>
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="<?= $photo["title"]?>" href="/<?= $photo["gallerylink"]?>"$><img src=        
                              "<?= $photo["gallerylink"]?>" height="120" alt=""/></a>

                            <div class="detail">
                              <input name="data[]" type="checkbox" id="data" value="<?php echo $photo['galleryid']; ?>">
                              <?php echo('<a href="editpics.php?action&galleryid='.$photo["galleryid"].'">Edit</a>');?>
                            </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
</form>

<script type="text/javascript" src="java/gallery.js"></script>
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