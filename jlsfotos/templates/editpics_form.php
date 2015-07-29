<div class="wrapper">
<div id="container">
        <img src="<?= $picinfo[0]["gallerylink"]?>" style="width:25%;height:25%;padding-bottom:15px;" alt=""/>
</div>
<form id="myForm" action="editsubmit.php" method="post">
  <fieldset>
    <div class="form-group">
        <input autofocus class="form-control" type="text" name="title" placeholder="enter title" value="<?= $picinfo[0]['title'] ?>" id="title"/><br />
        <input type="hidden" name="pic" value="<?= $picinfo[0]['galleryid'] ?>"/>
    </div>
    <div class="form-group">
        <select name="origin" id="origin" class="form-control">                                  
        <option value="<?php echo $picinfo[0]['cityid']; ?>" selected><?php                        
            if($picinfo[0]['cityid'] == 7)
            {echo "choose location...";} 
            else 
            {echo $picinfo[0]["city"];} ?></option>
            <?php
            foreach($cities as $citie) 
            { ?>
            <option value="<?= $citie['cityid'] ?>"><?= $citie['city'] ?></option>
            <?php } ?>
        </select><br />
    </div>
    <div class="form-group">
        <select name="cat" id="cat" class="form-control">                                  
        <option value="<?php echo $picinfo[0]['category']; ?>" selected><?php                        
            if($picinfo[0]['category'] == null)
            {echo "choose category...";} 
            else 
            {echo $picinfo[0]["catname"];} ?></option>
            <?php
            foreach($categories as $category) 
            { ?>
            <option value="<?= $category['catid'] ?>"><?= $category['catname'] ?></option>
            <?php } ?>
        </select><br />
    </div>
    <div class="form-group">
        <textarea class="form-control" name="descr" type="text" cols="100" rows="4" placeholder="enter description"><?= $picinfo[0]['descript'] ?></textarea><br />
    </div>
    <div class="form-group">
        <button id="submit">Submit</button>
        <div id="success"></div>
        <a href="gallery.php">back</a>
    </div>
  </fieldset>
</form>
<script type="text/javascript" src="java/edit.js"></script>