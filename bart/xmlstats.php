<?php

// upload all station data into database from BART API
require("bart/testconn3.php");

$bkey = 'ZUVB-UEUQ-ISYQ-DT35';
$url = "http://api.bart.gov/api/stn.aspx?cmd=stns&key=".$bkey."";
$xml = new SimpleXMLElement($url, null, true);

$stations = [];
$i=0;
$ids = $xml->stations->station;
foreach($ids as $id)
{
	$name = $xml->stations->station[$i]->name;
	$abbr = $xml->stations->station[$i]->abbr;
	$lat = $xml->stations->station[$i]->gtfs_latitude;
	$lng = $xml->stations->station[$i]->gtfs_longitude;

	$test = query("SELECT * FROM stations WHERE abbr=?", $abbr)
	if(count($test) == 0)
	{
		$sql = query("INSERT INTO stations (name, abbr, lat, lng) VALUES (?, ?, ?, ?)", $name, $abbr, $lat, $lng);
	}

	$stations[] = [
		"name" => $name,
		"abbr" => $abbr,
		"lat" => $lat,
		"lng" => $lng
	];
    $i++;
}
?>