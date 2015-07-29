<form id="myForm" action="newclient.php" method="POST">
  <fieldset>
    <div class="form-group">
		<input autofocus class="form-control" type="text" placeholder="Name" name="username" id="username"/><br />
		<div id="ack"></div>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Password" name="pass" id="pass"/><br />
		<div id="wack"></div>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" placeholder="Confirm password" name="confirm" id="confirm"/><br />
		<div id="cwack"></div>
	</div>
	<div class="form-group">
		<input class="form-control" type="text" placeholder="Email" name="email" id="email"/><br />
		<div id="wwack"></div>
	</div>
	<div class="form-group">
        <textarea class="form-control" name="comments" type="text" cols="100" rows="4" placeholder="enter comments"></textarea><br />
    </div>
		<button class="form-control" id="submit">register</button>
  </fieldset>
</form>
	<script type="text/javascript" src="java/newclient.js"></script>