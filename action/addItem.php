<?php include '../includes/header.php'; ?>
<?php
  //Create DB Object
  $db = new Database();


	if(isset($_POST['submit'])){
		//Assign Vars
		$item_name = mysqli_real_escape_string($db->link, $_POST['item_name']);
		$item_desc = mysqli_real_escape_string($db->link, $_POST['item_desc']);
		
		//Simple Validation
		if($item_name == ''|| $item_desc == ''){
			//set error
			$error = "Please fill out all required fields";
		} else{
			$query = "Insert INTO inventory 
						(item_name, item_desc)
						VALUES('$item_name', '$item_desc')";
			$insert_row = $db->insertItem($query);
		}
	}


?>
<?php


?>

<form role="form" method="post" action="addItem.php">
  <div class="form-group">
    <label for="item_name">Item Name</label>
    <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Enter Item Name">
  </div>
  <div class="form-group">
    <label for="editor1">Item Description</label>
    <textarea name="item_desc" id="editor1" class="form-control" rows="5" cols="40"></textarea>
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