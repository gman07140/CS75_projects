<?php require("templates/adminheader.php"); ?>
	
<form id="myForm" action="vphp.php" method="POST">
	<input type="text" placeholder="Name" name="username" id="username"/><br />
	<div id="ack"></div>
	<input type="password" placeholder="Password" name="pass" id="pass"/><br />
	<div id="wack"></div>
	<input type="password" placeholder="Confirm password" name="confirm" id="confirm"/><br />
	<div id="cwack"></div>
	<input type="text" placeholder="Email" name="email" id="email"/><br />
	<div id="wwack"></div>
	<button id="submit">register</button>
</form>

	<script src="jquery.js"></script>
	<script type="text/javascript" src="my_script.js"></script>
<?php require("footer.php"); ?>