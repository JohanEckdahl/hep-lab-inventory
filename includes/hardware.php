<?php
require_once ("initialize.php");

class Hardware extends DatabaseObject {

	public $location;

	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		global $database;

		//Find location with long-winded SQL
		$sql  = "SELECT date, recipient FROM shipment";
		$sql .= " WHERE id IN";
		$sql .= " (SELECT shipment_id FROM shipment_item";
		$sql .= " WHERE table_name= '".static::$table_name."'";
		$sql .= " AND table_key = ".$object->id;
		$sql .= " ) ORDER BY date DESC LIMIT 1";
		$result = $database->query($sql);
		$object->location = ($database->fetch_assoc($result))['recipient'];

	}

}

?>
