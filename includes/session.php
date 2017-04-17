<?php
//This class manages php sessions

class Session {
	
	
	//Attributes
	private $logged_in=false;
	public $user_id;
	
	//Constructor
	function __construct() {
		session_start(); //native function
		$this->check_login();
    }
	
		
	//Getter for private logged_in attribute
	//There is no setter
	public function is_logged_in() {
	    return $this->logged_in;
	}

	
	//Login
	public function login($user){
    	if($user){
    	  $this->user_id = $_SESSION['user_id'] = $user->id;
    	  $this->logged_in = true;
    	}
  	}
  	

	//Logout
	public function logout() {
	    unset($_SESSION['user_id']);
	    unset($this->user_id);
	    $this->logged_in = false;
	}
	
	private function check_login() {
	    if(isset($_SESSION['user_id'])) {
	      $this->user_id = $_SESSION['user_id'];
	      $this->logged_in = true;
	    } else {
			unset($this->user_id);
			$this->logged_in = false;
    	}
  	}	
  
}//Class Brace

$session = new Session();
!$session->is_logged_in() ? $session_link = "Login" : $session_link = "Logout";
?>
