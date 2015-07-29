<!DOCTYPE html>
<html>
  <head>
  <script src="java/jquery.js"></script>
  <link href="/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
  <link href="/css/fstyles.css" rel="stylesheet"/>
  <link href="/css/menu2.css" rel="stylesheet"/>
    <style type="text/css">
      #map-canvas { height: 420px;
        width: 850px;
        margin-left: 235px;
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
    <script type="text/javascript" src="java/mapnewcity.js"></script>
  </head>
  <body>
  <div id="top">    
            <ul id="saturday">
                <li><a href="newclient.php">Add new client</a></li>
                <li><a href="admintable2.php">Client list</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="map2.php">Map</a></li>
                <li><a href="newcityform.php">Add City</a></li>
                <li><a href="logout.php">Log Out</a></li> 
            </ul>
            </div>
  
<div id="map-canvas"></div>
<div class="container">

<div id="middle" class="form-group">
	<input autofocus class="form-control" type="text" name="address" placeholder="enter location here">
	<input type="button" name="search" value="Locate" class="btn btn-default">
</div>

<div id="address" class="push" name="address"></div>

<div id="apex" style="display:none;">
<input type="button" name="submit" value="Submit city">
</div>

<div id="lat" class="push" name="lat" style="display:none;"></div>
<div id="lng" class="push" name="lng" style="display:none;"></div>
<div id="progress"></div>
<a href="map2.php">map</a>
</div>
  </body>
</html>

