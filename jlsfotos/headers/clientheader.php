<!DOCTYPE html>
<html>
    <head>   
        <link href="/css/columns.css" rel="stylesheet"/>
        <link href="/css/flinks.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="/css/fstyles.css" rel="stylesheet"/>
        
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
 <div id="wrapper">
   <div class = "header">
     <img style="padding-bottom:20px;" alt="Arte, vida, fotografia" src="pics/textw.png"/>
     <div>
       <a class="small" href="logout.php">log out</a>
     </div>
   </div>