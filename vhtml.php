<?php require("header.php"); ?>
<?php require("fconfig.php"); ?>
	
<form id="myForm" action="vphp.php" method="POST">
	Username: <input type="text" name="username" id="username"/><br />
	<div id="ack"></div>
	Password: <input type="password" name="pass" id="pass"/><br />
	<div id="wack"></div>
	Email: <input type="text" name="email" id="email"/><br />
	<button id="submit">register</button>
</form>


	<script src="jquery.js"></script>
	<script type="text/javascript" src="my_script.js"></script>
<?php require("footer.php"); ?>
