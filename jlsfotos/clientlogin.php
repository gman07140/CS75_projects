<?php require("templates/header.php"); ?>
	
<form id="myForm" action="clientlog.php" method="POST">
<fieldset>
    <div class="form-group">
		<input autofocus class="form-control" placeholder="Email" type="text" name="email" id="email"/><br />
		<div id="emailack"></div>
	</div>

	<div class="form-group">
		<input class="form-control" placeholder="Password" type="password" name="pass" id="pass"/><br />
		<div id="passack"></div>
	</div>

	<div class="form-group">
		<button id="submit" class="btn btn-default">Login</button>
	</div>
</fieldset>
</form>
	<script src="jquery.js"></script>
	<script type="text/javascript" src="clientlog.js"></script>
<div>
    or go to <a href="adlogin.php">admin</a> page to log in as an administrator
</div>
<?php require("footer.php"); ?>