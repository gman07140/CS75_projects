var map = null;

// once the window has loaded...
$(window).load(function() {

// add the map and set coordinates
var mapOptions = {
        center: new google.maps.LatLng(37.773972, -122.271297),
          zoom: 11
        };
var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

// global arrays for markers, polyline coordinates and polylines
var marky = [];
var poly = [];
var line = [];
var info = [];

// declare global infowindow variable
var infowindow = new google.maps.InfoWindow();

// function for adding a marker to the page.
function addMarker(location,title) 
{
    marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title
    });
}

// add colored polyline from array of points
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

// add info windows
function addInfo(marker,content)
{
    google.maps.event.addListener(marker, 'click', (function(marker, content) 
    {
        return function() 
        {
            infowindow.setContent(content);
            infowindow.open(map, marker);
            info.push(infowindow);
        }
    })(marker, content));
}

// clear the map before new slection is added
function clear(markers,polylines,polypoints)
{
    for(i=0; i<markers.length; i++)
        {
            markers[i].setMap(null);
        }

    for(j=0; j<polylines.length; j++)
        {
            polylines[j].setMap(null);
        }

    polypoints.length = 0;
}

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

        // send the info to getContent
        getContent(stats[i]['abbr'],latln,title);

        poly.push(latln);
    }

        // polyline stuff outside
        var cor = stats[0]['color'];
        addPoly(poly,cor);
           
        line.push(paths);
        paths.setMap(map);            
}

// getContent: query the BART API to find real time train info
function getContent(station,latln,title)
{
    var bkey = 'ZUVB-UEUQ-ISYQ-DT35';
    var stationurl = "http://api.bart.gov/api/etd.aspx?cmd=etd&orig="+station+"&key="+bkey;
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
                            ests.push([dest,min]);
                        });
                    });

                    var appnd = prepareContent(ests,title);

                    addMarker(latln,title); // add the marker to the map
                    marky.push(marker);     // add the marker to the array so that it can be removed later

                    var content = appnd;   // add the content to the infowindow
                    addInfo(marker,content);    // add the infowindow
                },
            });
}

// prepare contents of infowindow
function prepareContent(ests, title)
{
    // show the station name in bold at the top, build content for the infowindow
    var append = title.bold()+": "+"<br>";

    // ensure there are actually trains listed in the API
    if (typeof ests !== 'undefined' && ests.length > 0) 
    {
        for(p=0; p<ests.length; p++)
        {   
            // if the train is leaving now, stylize it differently.
            if (ests[p][1] > 0)
            {
                append+= "Train heading towards "+ests[p][0].bold()+" leaving in "+ests[p][1].bold()+" minutes"+"<br>";
            }
            else
            {
                var str = ests[p][1];
                var atf = str.toLowerCase()+" now".bold();

                append+= "Train heading towards "+ests[p][0].bold()+" "+atf+"<br>";
            }
        }
    }
    else
    {
        append+= "No trains leaving this station"
    }
    return append;
}

$(document).ready(function()
{
    // when user changes select box, do the following
    // first, remove all markers
    $( 'select' ).change(function() {

    // clear out the map upon new selection
    clear(marky,line,poly);

    // get the value of the selection
    data = $( "#origin" ).val();

    // post the data to php file to return array of stations within route
    $.post('xmlgetstats.php',
        {data: data},
        function(html)
        {
            handleData(html);
        });
    return false;
    });
  });
});
