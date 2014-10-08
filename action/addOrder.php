<?php include '../includes/header.php'; ?>
<?php
  //Create DB Object
  $db = new Database();


	if(isset($_POST['submit'])){
		//Assign Vars
		$order_title = mysqli_real_escape_string($db->link, $_POST['order_title']);
		$order_status = mysqli_real_escape_string($db->link, $_POST['order_status']);
		$item_name = mysqli_real_escape_string($db->link, $_POST['item_name']);
		$order_quantity = mysqli_real_escape_string($db->link, $_POST['order_quantity']);
		$order_note = mysqli_real_escape_string($db->link, $_POST['order_note']);
		
		//Simple Validation
		if($order_title == ''|| $order_status == '' || $item_name == '' || $order_quantity == '' || $order_note == ''){
			//set error
			$error = "Please fill out all required fields";
		} else{
			$query = "Insert INTO orders 
						(order_title, order_status, item_name, order_quantity, order_note)
						VALUES('$order_title', '$order_status', '$item_name', '$order_quantity', '$order_note')";
			$insert_row = $db->insertOrder($query);
		}
	}


?>
<?php
	//Create query to use item name in a dropdown, pull item names from inventory table to use in orders

?>

<form role="form" method="post" action="addOrder.php">
	<div class="form-group">
	   	<label for="order_title">Order Title</label>
	  	<input type="text" class="form-control" name="order_title" id="order_title" placeholder="Enter Order Title">
  	</div>
  	<!-- Dropdown for order status -->
	<div class="form-group">
	    <label for="order_status">Order Status</label>
	    <input type="text" class="form-control" name="order_status" id="order_status">
 	</div>

 	<!-- Order name from inventory table -->
    <div class="form-group">
	    <label for="item_name">Item Name</label>
	    <input type="text" class="form-control" name="item_name" id="item_name">
  	</div>

  	<div class="form-group">
	    <label for="order_quantity">Order Quantity</label>
	    <input type="text" class="form-control" name="order_quantity" id="order_quantity" placeholder="Enter Order Quantity">
  	</div>

  <div class="form-group">
    <label for="editor1">Order Notes</label>
    <textarea name="order_note" id="editor1" class="form-control" rows="5" cols="40"></textarea>
      <script>
        CKEDITOR.replace('editor1');
      </script>    
  </div>
 
  <div>
	  <button type="submit" name="submit" role="button" class="btn btn-primary">Submit</button>
	  <button href="index.php" class="btn btn-default" role="button">Cancel</button>
  </div>
  <br>
</form>



<?php include '../includes/footer.php'; ?>