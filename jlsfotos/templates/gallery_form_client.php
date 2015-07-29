<div class="headertitle">
    <h1><?php echo $photos[0]['catname']; ?></h1><h1><?php echo $photos[0]['city']; ?></h1>
</div>
        <div id="content">
            <ul>
                <?php foreach ($photos as $photo): ?>
                    <li><a class="fancybox" rel="group" title="<?= $photo["title"]?>" href="/<?= $photo["gallerylink"]?>"$><img src=        
                              "<?= $photo["gallerylink"]?>" height="120" alt=""/></a>

                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

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