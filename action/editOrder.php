<?php include '../includes/header.php'; ?>
<?php

  $order_id = $_GET['order_id'];
  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM orders WHERE order_id = ".$order_id;

  //Run Query
  $orders = $db->select($query)->fetch_assoc();


?>


<?php
	if(isset($_POST['submit'])){
		//Assign Vars
		$order_title = mysqli_real_escape_string($db->link, $_POST['order_title']);
    $order_status = mysqli_real_escape_string($db->link, $_POST['order_status']);
		$order_quantity = mysqli_real_escape_string($db->link, $_POST['order_quantity']);
		$item_name = mysqli_real_escape_string($db->link, $_POST['item_name']); 
    $order_note = mysqli_real_escape_string($db->link, $_POST['order_note']);

   

		//Simple Validation
		if($order_title == ''|| $order_status== ''|| $order_quantity=='' || $item_name=='' || $order_note=='' ){
			//set error
			$error = "Please fill out all required fields";
		} else{
			$query = "UPDATE orders
                SET 
                order_title = '$order_title',
                order_quantity   = '$order_quantity',
                item_name    = '$item_name',
                order_status   = '$order_status',
                $item_name = 'item_name',
                $order_note= 'order_note'
						    WHERE order_id = '$order_id'";
			$update_row = $db->updateOrder($query);
		}
	}

?>

<?php
  //if delete button is pressed, remove item
  if(isset($_POST['delete'])){
      $query = "Delete FROM orders WHERE order_id = " .$order_id;
      $delete_row = $db->deleteOrder($query);
    }

?>
<div class="row">

<form role="form" method="post" action="editOrder.php?order_id=<?php echo $order_id;?>">

  <div class="form-group">
    <label for="order_id">Order ID</label>
    <input type="text" id="order_id" name="order_id" class="form-control" value="<?php echo $orders['order_id']; ?>">
  </div>
  
  <div class="form-group">
    <label for="order_title">Order Title</label>
    <input type="text" id="order_title" name="order_title" class="form-control" value="<?php echo $orders['order_title']; ?>">
  </div>
  <div class="form-group">
    <label for="order_status">Order Status</label>
    <input type="number" name="order_status" id="order_status" class="form-control" value="<?php echo $orders['order_status']; ?>">
  </div>

  <div class="form-group">
  <label for="order_quantity">Order Quantity</label>
    <input type="number" name="order_quantity" id="order_quantity" class="form-control" value="<?php echo $orders['order_quantity']; ?>"></textarea>
  </div>
  <div class="form-group">
    <label for="item_name">Item Name</label>
    <input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo $orders['item_name']; ?>">
  </div>


  <div class="form-group">
    <label for="editor1">Order Notes</label>
    <textarea name="order_note" id="editor1" class="form-control" rows="5" cols="40"><?php echo $orders['order_note'];?></textarea>
      <script>
        CKEDITOR.replace('editor1');
      </script>
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