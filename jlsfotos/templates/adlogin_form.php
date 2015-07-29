<div class="bootstrap">
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
<div class="bootstrap">
<script type="text/javascript" src="java/adlog.js"></script>
<div id="logtext">
    or go to <a href="clientlog.php">client</a> to log in as client
</div>