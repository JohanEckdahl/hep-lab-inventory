<?php
require_once ("initialize.php");

class Hardware extends DatabaseObject {

	public $location;


	protected static function find_location($object){
 		$sql  = "SELECT recipient FROM shipment";
                $sql .= " WHERE id IN";
                $sql .= " (SELECT shipment_id FROM shipment_item";
                $sql .= " WHERE table_name= '".get_class($object)::$table_name."'";
                $sql .= " AND table_key = ".$object->id;
                $sql .= " ) ORDER BY date DESC LIMIT 1";
                $array = self::find_assoc($sql);
		$location = array_pop($array)['recipient'];
		if(isset($location)){
			return $location;
		}else{
			return 'UCSB';
		}
	}

	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		$object->location = self::find_location($object);
	}
	
	public static function print_table_header($object_name){
		parent::print_table_header($object_name);
		echo "<a href='../../images/{$object_name}'> images </a>";
		echo " | <a href='../../data/{$object_name}'> data </a>";
	}
}

?>
