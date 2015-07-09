
<form class="ajax" action="bartgetstats.php" method="post">
<div id="middle" class="form-group">
	<select name="origin" id="origin" class="form-control">
	  <option selected="selected" value="0">Choose route</option>
	  <?php foreach ($routes as $route): ?>
	      <option name="route" value="<?= $route['rnumber'] ?>"><?= $route['routename'] ?></option>
	  <?php endforeach ?>
	</select>
<div id="details" style="display:none;">click on station marker for real-time schedule</div>
</div>
</form>
</div>
</div>
  </body>
</html>