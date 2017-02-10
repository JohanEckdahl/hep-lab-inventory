<?php
require_once ("initialize.php");

class Hardware extends DatabaseObject {

	public $location;

	protected static function get_extra_attributes($object){
		parent::get_extra_attributes($object);
		
	}

}

?>
