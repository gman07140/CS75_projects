</br>
<div id="wrapper">

    <td><form name="myForm" method="post" id="myForm">
      <table>
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
                <td><input name="data[]" type="checkbox" id="data" value="<?php echo $client['userID']; ?>"></td>
                <td><?php echo('<a href="adminpics2.php?action&userid='.$client["userID"].'">'.$client["userID"].'</a>');?></td>
                <td><?= $client["username"] ?></td>
                <td><?= $client["email"] ?></td>
                <td><?= $client["comments"] ?></td>
                <td><?php $numpics = query("SELECT COUNT(imageid) AS CountofImageid FROM images WHERE userID= ?", $client['userID']); echo $numpics[0]["CountofImageid"]; ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td><input name="delete" type="submit" id="delete" value="Delete"></td>
            <span id="passack"></span>
        </tr>
    </table>
   </form>
  </td>

</div>
<script type="text/javascript" src="java/delete2.js"></script>