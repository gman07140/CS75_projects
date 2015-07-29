// declare map as global variable
var map = null;

// once the window has loaded...
$(window).load(function() {
    var mapOptions = {
          center: new google.maps.LatLng(13.773972, -87.431297),
          zoom: 3
        };
    var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

// Function for adding a marker to the page.
function addMarker(location,title,cityid) 
{
    marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title,
        icon: 'pics/camera-icon.png',
        cityid: cityid
    });
}


$( document ).ready(function() {

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
                    map.setZoom(4);
                    
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

  }); // document ready closing
}); // window load closing