<!DOCTYPE html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>    
        <link href="/css/fstyles.css" rel="stylesheet"/>
        <link href="/css/ftable.css" rel="stylesheet"/>
        <link href="/css/flinks.css" rel="stylesheet"/>
        <link href="/css/pics.css" rel="stylesheet"/>
        <link href="/css/picar.css" rel="stylesheet"/> 
        <link href="css/thumbnail-gallery.css" rel="stylesheet"> 
        
        <?php if (isset($title)): ?>
            <title>CS50 Photography: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CS50 Photography</title>
        <?php endif ?>

        <script src="/java/jquery-1.11.2.min.js"></script>
        <script src="/java/jquery-1.11.2.js"></script>
        <script src="/java/bootstrap.min.js"></script>
        <script src="/java/scripts.js"></script>
        <script src="/java/picsjs.js"></script>
        <script src="/java/jquery.tablesorter.min.js"></script>
    </head>

<body>

    <!-- Navigation -->
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="pics/IMG_0477.JPG" alt="">
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="pics/IMG_0479.JPG" alt="">
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="pics/IMG_0482.JPG" alt="">
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="pics/IMG_0487.JPG" alt="">
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="pics/IMG_0489.JPG" alt="">
                </a>
            </div>
        </div>
        <hr>
    </div>


</body>

</html>
