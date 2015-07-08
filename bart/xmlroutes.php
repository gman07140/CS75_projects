<?php
// upload all route data into database from BART API
require("testconn3.php");

$bkey = 'ZUVB-UEUQ-ISYQ-DT35';
$url = "http://api.bart.gov/api/route.aspx?cmd=routes&key=".$bkey;
$xml = new SimpleXMLElement($url, null, true);

$routes = [];
$j=0;
$ids= $xml->routes->route;
foreach($ids as $id) 
{
	$name = $xml->routes->route[$j]->name;
	$number = $xml->routes->route[$j]->number;
	$color = $xml->routes->route[$j]->color;

	//if statement to prevent primary key voilations in case data was already entered
	$test = query("SELECT * FROM routes WHERE rnumber=?", $number);

	if(count($test) == 0)
	{
		$sql = query("INSERT INTO routes (routename, rnumber, color) VALUES (?, ?, ?)", $name, $number, $color);
	}

	$routs[] = [
		"name" => $name,
		"number" => $number,
		"color" => $color
	];

	// upload route details - all stations that lie in current route
	$url2 = "http://api.bart.gov/api/route.aspx?cmd=routeinfo&route=".$number."&key=".$bkey;
	$xml2 = new SimpleXMLElement($url2, null, true);
	$k=0;
	$idrs= $xml2->routes->route->config->station;
	foreach($idrs as $idr) 
	{
		$stat = $xml2->routes->route->config->station[$k];
		$test2 = query("SELECT id FROM routedets WHERE  abbr=? AND rnumber=?", $stat, $number);
			if(count($test2) == 0)
			{
				$sql = query("INSERT INTO routedets (abbr, rnumber) VALUES (?, ?)", $stat, $number);
			}
	    $k++;
	}
	$j++;
}

?>