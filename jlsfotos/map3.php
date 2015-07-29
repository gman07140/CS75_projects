<!DOCTYPE html>
<html>
  <head>
  <script src="java/jquery.js"></script>
  <link href="/css/columns.css" rel="stylesheet"/>
    <style type="text/css">
      #map-canvas { height: 420px;
        width: 850px;
        margin-left: 55px;
       margin-bottom: 15px;
       margin-top: 15px;
       border: 2px;
       border-color: #4D4D4D;
       border-style: solid;
        }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8kb9yqovVmnS3uXqZnYEgr0jGC6VX1sY">
    </script>
    <script type="text/javascript" src="java/gallerymap.js"></script>
  </head>
  <body>
<div id="wrapper">
   <div class = "header">
     <img style="padding-bottom:20px;" alt="Arte, vida, fotografia" src="pics/textw.png"/>
     <div>
       <a class="small" href="map3.php">map</a>
       <a class="smallast" href="columns.php">gallery</a>
       <a class="smallast" href="contact.php">contact</a>
       <a class="smallast" href="clientlog.php">log in</a>
     </div>
   </div>
   <div class="headertitle">
     <h1>click on location to view pictures!</h1>
     </div>

<div id="map-canvas"></div>
</div>
  </body>
</html>