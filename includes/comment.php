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

	protected static $form = array(
		'id' => 'null',
		'item_table'=> '',
		'table_key'	=> '',
		'datetime'	=> 'null',
		'user_id'	=> '',
		'body'		=> '',
	);


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
	

	public static function print_form($table_name, $table_key, $user_id){
		$html =	"<form action='../form/process.php?name=comment&action=insert' method = 'post'>
						 Comment:<br>
							<input style='width:600px;' type='text' name='0[body]' value=''>
							<input style='width:600px;' type='hidden' name='0[item_table]' value='{$table_name}'>
							<input style='width:600px;' type='hidden' name='0[table_key]' value='{$table_key}'>
							<input style='width:600px;' type='hidden' name='0[user_id]' value='{$user_id}'>
							<input style='width:600px;' type='hidden' name='0[id]' value='null'>
							<input style='width:600px;' type='hidden' name='0[datetime]' value='null'>
						  <br>
						  <input type='submit' value='Submit'>
					</form> ";
		echo $html;
	}	

}//class



?>
