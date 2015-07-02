<form id="myForm" action="newpass.php?action&userid=".$id."" method="POST">
<fieldset>
	<div class="form-group">
		<input class="form-control" placeholder="Password" type="password" name="pass" id="pass"/><br />
		<div id="passack"></div>
	</div>

	<div class="form-group">
		<input class="form-control" placeholder="Confirm password" type="password" name="confirm" id="confirm"/><br />
		<div id="confirmack"></div><div id="success" style="display: none;">You may now <a href="clientlog.php">login</a> with your new password</div>
	</div>

	<div class="form-group">
		<button id="submit" class="btn btn-default">Submit</button>
	</div>

</fieldset>
</form>
<script type="text/javascript" src="java/newpass.js"></script>