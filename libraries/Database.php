<?php

class Database{
	public $host = DB_HOST;
	public $username = DB_USER;
	public $password = DB_PASS;
	public $db_name = DB_NAME;

	public $link;
	public $error;

	//Class Constructor
	public function __construct(){

		//Call Connect Function
		$this->connect();
	}

	//Connector
	private function connect(){
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

		if(!$this->link){
			$this->error = "Connection Failed: " . $this->link->connect_error;
			return false;
		}
	}

	//Select 
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else{
			return false;
		}
	}

	//Insert
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/index.php?msg=".urlencode("Record Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}

	//Update
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/index.php?msg=".urlencode('Record Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/index.php?msg=".urlencode('Record Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}

/************************** ITEM INSERTS, UPDATES, AND DELETES*********************** /
**************************************************************************************/
	//Insert Item
	public function insertItem($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/items.php?msg=".urlencode("Item Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}


	//Update Item
	public function updateItem($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/items.php?msg=".urlencode('Item Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete Item
	public function deleteItem($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/items.php?msg=".urlencode('Item Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}

/************************** INVENTORY INSERTS, UPDATES, AND DELETES*********************** /
**************************************************************************************/
	//Insert Item
	public function insertInventory($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/inventory.php?msg=".urlencode("Inventory Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}


	//Update Item
	public function updateInventory($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/inventory.php?msg=".urlencode('Inventory Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete Item
	public function deleteInventory($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/inventory.php?msg=".urlencode('Inventory Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}

/************************** ORDER INSERTS, UPDATES, AND DELETES*********************** /
**************************************************************************************/
	//Insert Item
	public function insertOrder($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/orders.php?msg=".urlencode("Order Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}


	//Update Item
	public function updateOrder($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/orders.php?msg=".urlencode('Order Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete Item
	public function deleteOrder($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/orders.php?msg=".urlencode('Order Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}


/************************** TRANSACTION INSERTS, UPDATES, AND DELETES*********************** /
**************************************************************************************/
	//Insert Item
	public function insertTransaction($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/transactions.php?msg=".urlencode("Transaction Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}


	//Update Item
	public function updateTransaction($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/transactions.php?msg=".urlencode('Transaction Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete Item
	public function deleteTransaction($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/transactions.php?msg=".urlencode('Transaction Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}

/************************** User INSERTS, UPDATES, AND DELETES*********************** /
**************************************************************************************/
	//Insert Item
	public function insertUser($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($insert_row){
			header("Location: ../main/users.php?msg=".urlencode("User Added"));
			exit();
		} else{
			die('Error: ('. $this->link->errno . ') ' . $this->link->error);

		}

	}


	//Update Item
	public function updateUser($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($update_row){
			header("Location:  ../main/users.php?msg=".urlencode('User Updated'));
			exit();
		} else{
			die('Error: ( ' . $this->link->errno . ')'. $this->link->error);

		}

	}

	//Delete Item
	public function deleteUser($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

		//Validate Insert
		if($delete_row){
			header("Location:  ../main/users.php?msg=".urlencode('User Deleted'));
			exit();
		} else{
			die('Error: (. ' . $this->link->errorno.')'. $this->link->error);

		}

	}






}

