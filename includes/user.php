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
		$objects = static::find_by_attribute("username", $username);		
		return array_pop($objects);		
	}



}
?>

