<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 98%; 
      	width: 75%; 
      	margin: 0; 
      	padding: 0;
      	border: 25px;
      	border-color: #000000;
      	}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8kb9yqovVmnS3uXqZnYEgr0jGC6VX1sY">
    </script>
    <script type="text/javascript">
      function initialize() {

      	var myLatlng = new google.maps.LatLng(-42.773972,-111.431297);

        var mapOptions = {
          center: { lat: 13.773972, lng: -81.431297},
          zoom: 3
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });

      }
      // Function for adding a marker to the page.
    function addMarker(location) {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
<div id="map-canvas"></div>
  </body>
</html>