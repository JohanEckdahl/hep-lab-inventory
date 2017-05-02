<?php

require_once ("config.php");

class MySQLDatabase {


	//Connection
	

	//Connection Variable
	private $connection;

	//Constructor  
	function __construct() {
		$this->open_connection();
	}



	//Open Connection with Error Handling
	public function open_connection() {
	    $this->connection = mysqli_connect(server, user, password, name);
	    if(mysqli_connect_errno()) {
	      die("Database connection failed: " . 
           mysqli_connect_error() . 
           " (" . mysqli_connect_errno() . ")"
	      );
	    }
	  }

	// Close connection if Open
	public function close_connection() {
	    if(isset($this->connection)) {
	      mysqli_close($this->connection);
	      unset($this->connection);
	    }
	  }





	//Very Simple Error Handling


	//Perform Query with Confirmation
	public function query($sql) {
		//echo $sql;
	    $result = mysqli_query($this->connection, $sql);
	    $this->confirm_query($result);
	    return $result;
	}

	//Confirm Query or End process  
	private function confirm_query($result) {
	  	if (!$result) {
	  		die("Database query failed.");
	  	}
	}
 



	//The following functions are here for the purpose
	//of abstraction just in case the database ever changes


	public function fetch_assoc($result_set) {
	    return mysqli_fetch_assoc($result_set);
	  }

	public function fetch_array($result_set) {
	    return mysqli_fetch_array($result_set);
	  }


	//Useful function just in case it's needed
	public function escape_value($string) {
		return mysqli_real_escape_string($this->connection, $string);
	}


	//Useful 'Aftermath' functions	
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
		}

	public function insert_id() {
		return mysqli_insert_id($this->connection);
	}

	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}





}//Class Braces


// If this class is included it might as well be instantiated

$database = new MySQLDatabase();

?>

