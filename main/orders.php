<?php include '../includes/header.php' ?>
<?php
   //Create DB Object
  $db = new Database();

  //Check URL for category
  if(isset($_GET['orders'])){
      $orders = $_GET['orders'];
      $query = "SELECT * FROM orders WHERE orders = ".$orders . " ORDER BY id DESC";
      $posts = $db->select($query);
    } else{
        //Create Query
      $query = "SELECT * FROM orders
                ORDER by order_id DESC";
      //Run Query
      $orders = $db->select($query);
    }

  //Create Query
  $query = "SELECT * FROM orders";

  //Run Query
  $orders = $db->select($query);

  $query = "SELECT inventory.item_name, inventory.item_name, orders.item_name FROM inventory INNER JOIN orders ON inventory.item_name=orders.item_name";
  /*$query = "SELECT item.*, orders.item_name from item INNER JOIN orders on item.item_name = orders.item_name";*/
  $inventory = $db->select($query);

?>

		<h1><legend>Recent Orders</legend></h1>
    <button type="submit" onclick="window.location.href='../action/addOrder.php'" class="btn btn-primary">
    <span class="glyphicon glyphicon-plus"></span>  Add A New Order
    </button>
  		<table summary="Orders"class="table table-striped">
    		<thead>
    			<th>Order ID</th>
    			<th>Order Title</th>
    			<th>Status</th>
    			<th>Quantity</th>
    			<th>Item Name</th>
    			<th>Order Date</th>
    			<th>Notes</th>
    		</thead>

	<?php if($orders) : ?>
	  <?php while($row = $orders->fetch_assoc()) : ?>
	  		<tr>
	  			<td><?php echo $row['order_id'] ; ?></td>
	  			<td><?php echo $row['order_title'] ; ?></td> 		
	  			<td><?php echo $row['order_status'] ; ?></td>  		
	  			<td><?php echo $row['order_quantity'] ; ?></td>  		
	  			<td><?php echo $row['item_name'] ; ?></td>  		
	  			<td><?php echo formatDate($row['order_date']) ; ?></td> 
	  			<td><?php echo $row['order_note'] ; ?></td>
	  			<td><button type="button" class="btn btn-sm btn-danger">Modify</button></td>
	  		</tr>
       
	<?php endwhile; ?>
	  		</table>  
	            
	<?php else : ?>
	  <p>There are no orders yet</p>
	<?php endif; ?>

<?php include '../includes/footer.php' ?>
