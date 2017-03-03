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
	

}



?>
