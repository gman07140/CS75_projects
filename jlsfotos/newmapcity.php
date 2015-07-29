<?php
    // configuration
	require("testconn2.php");

	$city = $_POST["address"];
	$lat = $_POST["lat"];
	$lng = $_POST["lng"];

	$sql = query("INSERT INTO cities (city, lat, lng) VALUES (?, ?, ?)", $city, $lat, $lng);

    echo ($city." added to cities!");
?>