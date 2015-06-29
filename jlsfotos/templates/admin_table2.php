</br>
<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script> 
<div id="wrapper">
    <table id="keywords" cellspacing="0" cellpadding="0">
    
    <tr>
    <td><form name="form1" method="post" action="delete.php">
      <table id="keywords" cellspacing="0" cellpadding="0">

        <thead>                 
        <tr>
            <th>Delete?</th>
            <th>ClientID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Notes</th>
            <th># of pics</th>
        </tr>
        </thead>
        
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><div style="width: 10px align: center"><input name="data[]" type="checkbox" id="data" value="<?php echo $client['userID']; ?>"></div></td>
                <td><div style="width: 10px align: center"><?php echo('<a href="adminpics2.php?action&userid='.$client["userID"].'">'.$client["userID"].'</a>');?></div></td>
                <td><div style="width: 70px align: center"><?= $client["username"] ?></div></td>
                <td><div style="width: 355px align: left"><?= $client["email"] ?></div></td>
                <td><div style="width: 50px align: center"><?= $client["comments"] ?></div></td>
                <td><div style="width: 10px align: center"><?php $numpics = query("SELECT COUNT(imageid) AS CountofImageid FROM images WHERE userID= ?", $client['userID']); echo $numpics[0]["CountofImageid"]; ?></div></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td><input Onclick='return ConfirmDelete();'' name="delete" type="submit" id="delete" value="Delete"></td>
        </tr>
    </table>
   </form>
  </td>
 </tr>
</table>
</div>