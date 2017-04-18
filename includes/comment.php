<?php
require_once ("initialize.php");

class Comment extends DatabaseObject{

	//MySQL Attributes
	protected static $table_name = 'comment';
	public $table_key;
	public $datetime;
	public $body;
	public $user_id;
	public $item_table;


	//Extra Attributes
	public $username;


	//Web Table Display Arrays
        public static $table_header=array('Comment ID', 'Date-Time', 'User', 'Object', 'ID', 'Comment');
        public static $table_attributes= array('id', 'datetime', 'username', 'item_table', 'table_key', 'body');



	
	protected static function find_username($object){
		$sql = "SELECT username FROM user";
		$sql.= " WHERE id = ".$object->user_id;
		$sql.= " LIMIT 1";
		return @array_pop(self::find_assoc($sql))['username'];
	}



	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		$object->username = self::find_username($object);
	}
	

	public static function print_form(){
		global $session;			
		if ($session->is_logged_in()){	
		$html =	"<form action='../admin/insert.php' method = 'post'>
						 Comment:<br>
						  <input style='width:600px;' type='text'name='data[body]' value=''>
						  <br>
						  <input type='submit' value='Submit'>
					</form> ";
		echo $html;
		}
	}


/*
	public static function make($table, $key, $user_id, $body){
		$keys = array ("item_table", "table_key", "user_id", "body");		
		$values = array($table, $key, $user_id, $body);
		$assoc = array_combine($keys, $values);
		static::insert($assoc);
	}
	*/	

}//class



?>
