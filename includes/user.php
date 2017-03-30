<?php
require_once ("initialize.php");


class User extends DatabaseObject {
	
	// Attributes

	protected static $table_name="user";	
	
	public $username;
	public $password;
	
	
	//Authenticate User
	public static function authenticate($username="", $password="") {
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);	
		@$object = array_pop(static::find_by_attribute("username", $username));
	
		if(isset($object)){
			return $object->password == $password ? $object : array();		
		}else{
			return array();
		}	

	}



}
?>

