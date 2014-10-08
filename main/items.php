<?php include '../includes/header.php' ?>
<?php
   //Create DB Object
  $db = new Database();

  //Check URL for category
  if(isset($_GET['inventory'])){
      $inventory = $_GET['inventory'];
      $query = "SELECT * FROM inventory WHERE inventory = ".$inventory . " ORDER BY id DESC";
      $posts = $db->select($query);
    } else{
        //Create Query
      $query = "SELECT * FROM inventory  
                ORDER by item_id DESC";
      //Run Query
      $inventory = $db->select($query);
    }
?>

    <h1><legend>Current Items</legend></h1>
      <button type="submit" onclick="window.location.href='../action/addItem.php'" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>  Add A New Item
      </button>
    <table summary="items" class="table table-striped">
      <thead>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Item Desc</th>
      </thead>

  <?php if($inventory) : ?>
    <?php while($row = $inventory->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['item_id'] ; ?></td>
          <td><?php echo $row['item_name'] ; ?></td>    
          <td><?php echo $row['item_desc'] ; ?></td>  
          <td><button type="button" class="btn btn-sm  btn-danger" onclick="window.location.href='../action/editInventory.php?item_id=<?php echo urlencode($row['item_id']); ?>'" >Modify <?php echo $row['item_id'];?></button></td>
        </tr>
  <?php endwhile; ?>
        </table>  
              
  <?php else : ?>
    <p>There are no inventory yet</p>
  <?php endif; ?>

<?php include '../includes/footer.php' ?>