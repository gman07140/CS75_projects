<?php require("templates/header.php"); ?>

<form action="adminlog.php" method="post" id="myForm">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" id="adName" name="adName" placeholder="Admin" type="text"/>
            <div id="nameack"></div>
        </div>
	        
        <div class="form-group">
            <input class="form-control" id="adPassword" name="adPassword" placeholder="Password" type="password"/>
            <div id="passack"></div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default" id="submit">Log In</button>
        </div>
    </fieldset>
</form>
<script src="jquery.js"></script>
<script type="text/javascript" src="adlog.js"></script>
<div>
    or go to <a href="clientlogin.php">client</a> to log in as client
</div>
<?php require("footer.php"); ?>