<?php
require_once ("initialize.php");

class Component extends Hardware {
	
	//This class extends hardware and finds the module id for components.	
	//All components have a module_id whether it is null or not.
	
	
	public $module_id;

	protected static function find_module_id($object){
		global $database;		
		$sql = "SELECT id FROM module WHERE ";
		$sql .= static::$table_name."_id = {$object->id} LIMIT 1"; 
		$x=$database->fetch_array($database->query($sql))[0];
		if (isset($x)) {return $x;}	
	}

	
	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		$object->module_id = self::find_module_id($object);
	}
}


?>
