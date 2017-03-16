<?php
require_once ("initialize.php");

class Module extends Hardware {

	protected static $table_name = 'module';
	public $plate_id;
	public $sensor_id;
	public $pcb_id;
	public $barcode;


	//Extra Attributes
	// none right now	


	//Web Table Display Arrays
	public static $table_header=array('Module ID', 'Sensor ID', 'PCB ID', 'Plate ID', 'Location');
	public static $table_attributes= array('id', 'sensor_id', 'pcb_id', 'plate_id', 'location');



	//Methods
	public static function print_extra_info($object){
		parent::print_extra_info($object);
		$components=array('sensor', 'pcb', 'plate');
		foreach($components as $component){			
			$cid=$component."_id";
			static::print_table_column_names($component);
			$object2 = ucfirst($component)::find_by_attribute('id', $object->$cid);			
			static::print_table_attributes($object2);
			echo "<br><br><hr>";		
		}
	}


}



?>
