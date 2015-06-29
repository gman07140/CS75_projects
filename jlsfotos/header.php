<!DOCTYPE html>
<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>    
        <link href="/css/fstyles.css" rel="stylesheet"/>
        <link href="/css/ftable.css" rel="stylesheet"/>
        <link href="/css/flinks.css" rel="stylesheet"/>
        <link href="/css/thumbnail-gallery.css" rel="stylesheet">
        <?php if (isset($title)): ?>
            <title>CS50 Photography: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CS50 Photography</title>
        <?php endif ?>
        <script src="/jquery.js"></script>
        <script src="/java/jquery-1.11.3.js"></script>
        <script src="/java/bootstrap.min.js"></script>
        <script src="/java/scripts.js"></script>
        <script src="/java/picsjs.js"></script>
        <script src="/java/jquery.tablesorter.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div id="top">
                <img alt="CS50 Photography" src="logopics/banner2.png"/>
            </div>                            
            <div id="middle">
