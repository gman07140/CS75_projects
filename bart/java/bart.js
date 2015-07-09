// declare map as global variable
var map = null;

// once the window has loaded...
$(window).load(function() {

// add the map and set coordinates
var mapOptions = {
        center: new google.maps.LatLng(37.773972, -122.271297),
          zoom: 10
        };
var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

// global arrays for markers, polyline coordinates, polylines, and infowindows
var marker_array = [];
var poly = [];
var line = [];
var info = [];

// declare infowindow as global variable
var infowindow = new google.maps.InfoWindow();

// ensure document is ready...
$(document).ready(function()
{
    // when user changes select box, do the following...
    $( 'select' ).change(function() {

    // clear the map upon new selection
    clear(marker_array,line,poly,info);

    // get the value of the selection from value of select box
    data = $( "#origin" ).val();

    // show further instructions in '#details' div only if user has selected a valid route
    if (data > 0)
    {
        $("#details").css("display","block");
    }
    else
    {
        $("#details").css("display","none");
    }

    // post the data to php file to return array of stations within route
    $.post('bartgetstats.php',
        {data: data},
        function(html)
        {
            handleData(html);
        });
    return false;
    });
});

// manipulate data from database delivered through ajax
function handleData(html) 
{
    // parse the database data
    var stats = JSON.parse(html);

    // for each station in route...
    for (var i = 0; i < stats.length; i++)          
    {
        // prepare coordinates and title for each marker
        var latln = new google.maps.LatLng(stats[i]['lat'],stats[i]['lng']);
        var title = stats[i]['name'];
        var abbr = stats[i]['abbr'];

        addMarker(latln,title,abbr);    // add marker to  map
        marker_array.push(marker);      // push marker to the array so that it can be removed later

        var cor = stats[0]['color'];    // get the route color from the query.  Just take the first record.  All records same color.

        addInfo(marker,cor);            // add infowindow
        info.push(infowindow);          // push infowindow to the 'info' array

        poly.push(latln);               // push coordinates to polyline 'poly' array
    }
    
    addPoly(poly,cor);      // add a polyline with current route color
           
    line.push(paths);       // push polyline to 'line' array to be removed upon next selection
    paths.setMap(map);      // show polyline for current route on map
}

// getContent: query the BART API to find real time train info
function getContent(abbr,title,color)
{
    var bkey = 'ZUVB-UEUQ-ISYQ-DT35';
    var stationurl = "http://api.bart.gov/api/etd.aspx?cmd=etd&orig="+abbr+"&key="+bkey;
    var ests = [];
    $.ajax({
            url: stationurl,
            type: 'GET', 
            dataType: 'xml',
            success: function(data)
            {
                // do the following for each destination
                $(data).find('station etd').each(function()
                {
                    var dest = $(this).find('destination').text();
                    var $this = $(this);

                    // do the following for each estimate (train)
                    $this.find('estimate').each(function()
                    {
                        var min = $(this).find('minutes').text();
                        var cor = $(this).find('hexcolor').text();

                        // only include if is on route
                        if(cor == color)
                        {   
                            ests.push([dest,min]);
                        }
                    });
                });

                var appnd = prepareContent(ests,title);
                infowindow.setContent(appnd);   // add the content to the infowindow
            },
        });
}

// prepare contents of infowindow
function prepareContent(ests, title)
{
    // show the station name at the top, build content for the infowindow
    var append = "<h4 style='color:blue'>"+title+"</h4>";

    // ensure there are actually trains listed in the API
    if (typeof ests !== 'undefined' && ests.length > 0) 
    {
        for(p=0; p<ests.length; p++)
        {   
            // if the train is leaving now, stylize it differently.
            if (ests[p][1] > 0)
            {
                append+= "Train headed to "+ests[p][0].bold()+" leaving in "+ests[p][1].bold()+" minutes"+"<br>";
            }
            else
            {
                var str = ests[p][1];
                var atf = str.toLowerCase()+" now".bold();

                append+= "<strong style='color:red'>Train headed to "+ests[p][0].bold()+" "+atf+"</strong><br>";
            }
        }
    }
    else
    {
        append+= "No trains currently leaving from "+title+" for this route"
    }
    return append;
}

// function for adding a marker to the page.
function addMarker(location,title,abbr) 
{
    marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title,
        icon: 'pics/train-icon2.png',
        abbr: abbr
    });
}

// function to add colored polyline from array of points called 'points'
function addPoly(points,color)
{
    paths = new google.maps.Polyline({
            path: points,
            geodesic: true,
            strokeColor: color,
            strokeOpacity: 1.0,
            strokeWeight: 4
            });
}

// function to add and set content for info windows
function addInfo(marker,color)
{
    google.maps.event.addListener(marker, 'click', (function(marker) 
    {   
        // when user clicks on marker, do the following
        return function() 
        {
            // clear content from previous selection
            infowindow.setContent(null);

            // user 'getContent' to populate info window
        	getContent(marker.abbr,marker.title,color);

            // open the info window
        	infowindow.open(map, marker);
        }
    })(marker));
}

// clear the map before new slection is added
function clear(markers,polylines,polypoints,info)
{
    for(i=0; i<markers.length; i++)
        {
            markers[i].setMap(null);
        }

    for(j=0; j<polylines.length; j++)
        {
            polylines[j].setMap(null);
        }

    info.length = 0;

    polypoints.length = 0;
}
});