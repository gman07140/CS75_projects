<?php require("header.php"); ?>
<?php require("fconfig.php"); ?>
	
<form id="myForm" action="clientlog.php" method="POST">
	Email: <input type="text" name="email" id="email"/><br />
	<div id="emailack"></div>
	Password: <input type="password" name="pass" id="pass"/><br />
	<div id="passack"></div>
	<button id="submit">Login</button>
</form>

	<script src="jquery.js"></script>
	<script type="text/javascript" src="clientlog.js"></script>
<?php require("footer.php"); ?>