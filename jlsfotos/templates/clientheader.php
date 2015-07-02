<!DOCTYPE html>
<html>
    <head>
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/fstyles.css" rel="stylesheet"/>
        <link href="/css/flinks.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="/css/menu2.css" rel="stylesheet"/>
        
        <?php if (isset($title)): ?>
            <title>Vida, arte, photografia: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Vida, arte, photografia</title>
        <?php endif ?>
        <script src="/java/jquery.js"></script>
        <script src="/java/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">

    </head>
    <body>
        <div class="container">
            <div id="top">
                <img alt="CS50 Photography" src="logopics/banner2.png"/>
            </div>                           
            <ul class="ex">
            <li class="ex"><a href="logout.php"><strong>Log Out</strong></a></li>
            </ul> 
            <div id="middle">
