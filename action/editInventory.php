<?php include '../includes/header.php'; ?>
<?php

  $item_id = $_GET['item_id'];
  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM inventory WHERE item_id = ".$item_id;

  //Run Query
  $inventory = $db->select($query)->fetch_assoc();


?>


<?php
	if(isset($_POST['submit'])){
		//Assign Vars
		$item_name = mysqli_real_escape_string($db->link, $_POST['item_name']);
    $instock = mysqli_real_escape_string($db->link, $_POST['instock']);
		$barcode = mysqli_real_escape_string($db->link, $_POST['barcode']);
		$serial = mysqli_real_escape_string($db->link, $_POST['serial']);



   

		//Simple Validation
		if($item_name == ''|| $instock== ''){
			//set error
			$error = "Please fill out all required fields";
		} else{
			$query = "UPDATE inventory
                SET 
                item_name = '$item_name',
                barcode   = '$barcode',
                serial    = '$serial',
                instock   = '$instock'
						    WHERE item_id = '$item_id'";
			$update_row = $db->updateInventory($query);
		}
	}

?>

<?php
  //if delete button is pressed, remove item
  if(isset($_POST['delete'])){
      $query = "Delete FROM inventory WHERE item_id = " .$item_id;
      $delete_row = $db->deleteInventory($query);
    }

?>
<div class="row">

<form role="form" method="post" action="editInventory.php?item_id=<?php echo $item_id;?>">

  <div class="form-group">
    <label for="item_id">Item ID</label>
    <input type="text" id="item_id" name="item_id" class="form-control" value="<?php echo $inventory['item_id']; ?>">
  </div>
  
  <div class="form-group">
    <label for="item_name">Item Name</label>
    <input type="text" id="item_name" name="item_name" class="form-control" value="<?php echo $inventory['item_name']; ?>">
  </div>
  <div class="form-group">
    <label for="instock">Quantity</label>
    <input type="number" name="instock" id="instock" class="form-control" value="<?php echo $inventory['instock']; ?>">
  </div>

  
  <label for="barcode">Barcode</label>
  <input type="text" name="barcode" id="barcode" class="form-control" value="<?php echo $inventory['barcode']; ?>"></textarea>
  <div class="form-group">
    <label for="serial">Serial Number</label>
    <input type="text" class="form-control" name="serial" id="serial" value="<?php echo $inventory['serial']; ?>">
  </div>
  <br>
  <div>
	  <button type="submit" name="submit" role="button" class="btn btn-primary">Submit</button>
	  <input type="submit" role="button" name="cancel" class="btn btn-default" value="Cancel" />
    <input type="submit" role="button" name="delete" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>
</div>



<?php include '../includes/footer.php'; ?>