<?php
    // configuration
	require("testconn2.php");

	$sql = query("SELECT * FROM cities");

    echo json_encode($sql);

?>