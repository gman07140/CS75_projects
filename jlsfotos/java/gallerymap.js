// declare map as global variable
var map = null;

// once the window has loaded...
$(window).load(function() {
    var mapOptions = {
          center: new google.maps.LatLng(21.773972, -87.431297),
          zoom: 3,
          mapTypeId: google.maps.MapTypeId.HYBRID
        };
    var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);


// declare infowindow as global variable
var infowindow = new google.maps.InfoWindow();

// Function for adding a marker to the page.
function addMarker(location,title,cityid) 
{
    marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title,
        icon: 'pics/camws.png',
        cityid: cityid
    });
}

// function to add and set content for info windows
function addInfo(marker)
{
    google.maps.event.addListener(marker, 'click', (function(marker) 
    {   
        // when user clicks on marker, do the following
        return function() 
        {
            // clear content from previous selection
            infowindow.setContent(null);

            // user 'getContent' to populate info window
        	getContent(marker.cityid);

            // open the info window
        	infowindow.open(map, marker);
        }
    })(marker));
}

// getContent: query the BART API to find real time train info
function getContent(cityid)
{
    var pics = [];

    $.post("mappics.php",{cityid:cityid}, function( info ) 
    {
        var pic = JSON.parse(info);
        var title = pic[0].city;
        console.log(title);

        // make sure city is not null
        if (cityid != 7)
            for (var i = 0; i < pic.length; i++)
            {
            	var pick = pic[i].linkys;
            	pics.push(pick);
            	console.log(pick);
            }
        var appnd = prepareContent(pics,title,cityid);
        infowindow.setContent(appnd);   // add the content to the infowindow
    });
    return false;
}

// prepare contents of infowindow
function prepareContent(pics, title, cityid)
{
    // show the city name at the top, build content for the infowindow
    var append = "<h4 style='color:blue'>"+title+"</h4><a href='gallery_client.php?action&cityid="+cityid+"'><h5>"+pics.length+" picture(s)</h5></a>";

    var prev;
    if(pics.length > 4){prev = 4}else{prev = pics.length}

    for(p=0; p<prev; p++)
    {   
    	var newpic = pics[p];
    	append +="<img src='"+newpic+"'style='width:100px;height:70px;padding-right:7px;'>";
    }

    return append;
}

$( document ).ready(function() {
  // get a list of all cities in database
	$.get( "map.php", function( data ) 
	{
		$( ".result" ).html( data );
		var citys = JSON.parse(data);
		
		for (var i = 0; i < citys.length; i++)		    
		{
		    var latlng = new google.maps.LatLng(citys[i].lat,citys[i].lng);
			var title = citys[i].city;
			var cityid = citys[i].cityid;

            if(cityid != 7)
            {
                addMarker(latlng,title,cityid);
                addInfo(marker); 
            }
		}
	});
    $('input[name=search]').click(function() {

        var geocoder = new google.maps.Geocoder(); 
        geocoder.geocode({
                address : $('input[name=address]').val(), 
                region: 'no' 
            },
            function(results, status) {
                if (status.toLowerCase() == 'ok') {
                    // Get center
                    var coords = new google.maps.LatLng(
                        results[0]['geometry']['location'].lat(),
                        results[0]['geometry']['location'].lng()
                    );

                    var address = results[0]['formatted_address'];

                    $('#address').html(address);
                    $('#lat').html(coords.lat());
                    $('#lng').html(coords.lng());

                    $('#apex').show();
                    
                    map.setCenter(coords);
                    map.setZoom(5);
                    
                    // Set marker also
                    marker = new google.maps.Marker({
                        position: coords, 
                        map: map, 
                        title: $('input[name=address]').val(),
                    });
                                    
                }
            }
        );
    }); // click search closing

    $('input[name=submit]').click(function() {

        var data = {};

        // have to send an array with an index to the php file
        $(".push").each(function (index,value) {
                    name = $(this).attr('name'),
                    value = $(this).text();

                    data[name] = value;          
            });

        $.ajax({
            url: 'newmapcity.php',
            type: 'post',
            data: data,
            success: function(html) {
                $('#progress').html(html);
              }
        })
        return false;
    
    }); // click submit closing
	});
});