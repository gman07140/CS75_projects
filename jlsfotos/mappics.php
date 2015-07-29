<?php
    // configuration
	require("testconn2.php");

	$id = $_POST["cityid"];

	$sql = query("SELECT DISTINCT gallerylink AS linkys, city 
				FROM gallery, cities 
				WHERE gallery.cityid = cities.cityid AND gallery.cityid=?", $id);

	echo json_encode($sql);

?>