<!DOCTYPE html>
<html>
  <head>
  <link href="/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
  <link href="/css/fstyles.css" rel="stylesheet"/>
  <script src="/java/jquery.js"></script>
    <style type="text/css">
      #map-canvas { height: 470px;
        width: 850px;
        margin-left: 135px;
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
      <script type="text/javascript" src="java/bart.js"></script>
  </head>
  <body>
  <div class="container">
    <h3>Bay Area Rapid Transit</h3>
  <h5>Select route below to see details</h5>
<div id="map-canvas"></div>