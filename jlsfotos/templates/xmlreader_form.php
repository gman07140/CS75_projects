<form class="ajax" action="xmlgetstats.php" method="post">
	<select name="origin" id="origin">
	  <option selected="selected">Choose route</option>
	  <?php foreach ($routes as $route): ?>
	      <option name="route" value="<?= $route['rnumber'] ?>"><?= $route['routename'] ?></option>
	  <?php endforeach ?>
	</select>
	<div>
	<button type="submit" class="btn btn-default">Send</button>
	</div>
	<div id="progress" style="hidden">
	</div>
</form>
  </body>
</html>