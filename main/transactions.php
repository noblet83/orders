<?php include '../includes/header.php' ?>
<?php
   //Create DB Object
  $db = new Database();

  //Check URL for category
  if(isset($_GET['trans'])){
      $trans = $_GET['trans'];
      $query = "SELECT * FROM trans WHERE trans = ".$trans . " ORDER BY id DESC";
      $trans = $db->select($query);
    } else{
        //Create Query
      $query = "SELECT * FROM transactions
                ORDER by trans_id DESC";
      //Run Query
      $trans = $db->select($query);
    }
?>


		<h1><legend>Recent Transactions</legend></h1>
      <button type="submit" onclick="window.location.href='../action/addTransaction.php'" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>  Add A New Transaction
      </button>
		<table summary="transactions"class="table table-striped">
  		<thead>
  			<th>Trans ID</th>
  			<th>Status</th>
  			<th>Note</th>
  			<th>Item Name</th>
  			<th>SID</th>
  			<th>Trans Time</th>
  		</thead>

	<?php if($trans) : ?>
	  	<?php while($row = $trans->fetch_assoc()) : ?>
	  		<tr>
	  			<td><?php echo $row['trans_id'] ; ?></td>
	  			<td><?php echo $row['trans_status'] ; ?></td> 	
	  			<td><?php echo $row['trans_note'] ; ?></td>  		
	  			<td><?php echo $row['item_id'] ; ?></td>  		
	  			<td><?php echo $row['user_sid'] ; ?></td>  		
	  			<td><?php echo formatDate($row['trans_time']) ; ?></td>
	  			<td><button type="button" class="btn btn-sm btn-danger">Modify</button></td>
	  		</tr>
       
		<?php endwhile; ?>
	  		</table>  
	            
	<?php else : ?>
	  <p>There are no transactions yet</p>
	<?php endif; ?>

<?php include '../includes/footer.php' ?>