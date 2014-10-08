<?php include '../includes/header.php'; ?>
<?php
  //Create DB Object
  $db = new Database();


	if(isset($_POST['submit'])){
		//Assign Vars
		$item_name = mysqli_real_escape_string($db->link, $_POST['item_name']);
    $instock = mysqli_real_escape_string($db->link, $_POST['instock']);
		$barcode = mysqli_real_escape_string($db->link, $_POST['barcode']);
		$serial = mysqli_real_escape_string($db->link, $_POST['serial']);



     //Create a query to use for drop down when selecting an Item Name
  

		//Simple Validation
		if($item_name == ''|| $instock== ''){
			//set error
			$error = "Please fill out all required fields";
		} else{
			$query = "UPDATE inventory
                SET 
                item_name = '$item_name',
                barcode = '$barcode',
                serial = '$serial',
                instock = '$instock'
						    WHERE item_name = '$item_name'";
			$update_row = $db->updateInventory($query);
		}
	}
$query = "SELECT * FROM inventory  
                ORDER by item_name ASC";
  //Run Query
  $inventory = $db->select($query);




?>
<?php


?>
<form role="form" method="post" action="addInventory.php">
  <!-- Add dropdown to choose item name -->
  
  <div class="form-group md-col-6">
    <label for="item_name">Item Name</label>
    <br>

  <?php if($inventory):?>
    <select id="item_name" name="item_name" class="form-control">
      <?php while($row = $inventory->fetch_assoc()) : ?>       
        <option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>     
      <?php endwhile  ;?>
    </select>

  <?php else : ?>
    <p>There are no inventory yet</p>
  <?php endif; ?>

  <div class="form-group md-col-4">
    <label for="instock">Quantity</label>
    <input type="number" name="instock" id="instock" class="form-control">
  </div>

  </div>
  <label for="barcode">Barcode</label>
  <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Enter Barcode"></textarea>
  <div class="form-group">
    <label for="serial">Serial Number</label>
    <input type="text" class="form-control" name="serial" id="serial" placeholder="Serial Number">
  </div>
  <br>
  <div>
	  <button type="submit" name="submit" role="button" class="btn btn-primary">Submit</button>
	  <button href="index.php" class="btn btn-default" role="button">Cancel</button>
  </div>
  <br>
</form>



<?php include '../includes/footer.php'; ?>