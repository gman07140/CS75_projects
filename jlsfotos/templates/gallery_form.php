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
                              "checkbox" id="data" value="<?php echo $photo['link']; ?>">
                              <select name="origin" id="origin">
                                  <option selected="<?php 
                                  $cit = query("SELECT city FROM cities WHERE cityid =?", $photo["cityid"]);
                                  if($photo["cityid"] == 0)
                                  {echo "choose location...";} else {echo $cit[0]["city"];} ?>"><?php 
                                  $cit = query("SELECT city FROM cities WHERE cityid =?", $photo["cityid"]);
                                  if($photo["cityid"] == 0)
                                  {echo "choose location...";} else {echo $cit[0]["city"];} ?></option>
                                  <?php
                                    foreach($cities as $citie) { ?>
                                      <option value="<?= $citie['cityid'] ?>"><?= $citie['city'] ?></option>
                                  <?php
                                    } ?>
                                </select>
                                <input name="updateloc" type="submit" id="updateloc" value="Update location">

                              </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</form>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/java/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/java/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/java/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });