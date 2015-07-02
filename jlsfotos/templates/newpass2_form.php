<form class="ajax" action="newpassemail.php" method="post">
<fieldset>
    <div class="form-group">
		<input autofocus class="form-control" placeholder="Email" type="text" name="email" id="email"/><br />
		<div id="emailack"></div>
	</div>
	
    <div class="form-group">
        <button type="submit" class="btn btn-default">Send</button>
        <div id="progress"></div>
    </div>
</fieldset>
</form>
	<script type="text/javascript" src="java/newpassemail.js"></script>
<div>
    <a href="clientlog.php">back</a>
</div>