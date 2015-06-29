<?php
    require ("fconfig.php");
	$sql = query("INSERT INTO users (username, password, email) VALUES(?, ?, ?)", $_POST["username"], md5($_POST["pass"]), $_POST["email"]);


?>
