<!DOCTYPE html>
<html>
  <head>
  <script src="/java/jquery.js"></script>
    <style type="text/css">
      html, body, #map-canvas { height: 98%; 
      	width: 85%; 
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

$( document ).ready(function() {
	var mapOptions = {
          center: { lat: 13.773972, lng: -87.431297},
          zoom: 3
        };
    var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

	$.get( "tester.php", function( data ) {
		$( ".result" ).html( data );
		var citys = JSON.parse(data);
		
		for (var i = 0; i < citys.length; i++)		    {
		    	var latlng = citys[i].lat+","+citys[i].lng;
		    	var marker = new google.maps.Marker({
			      position: new google.maps.LatLng(citys[i].lat, citys[i].lng),
			      map: map,
			      title: citys[i].city
			  });
		    }
		});
	});

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