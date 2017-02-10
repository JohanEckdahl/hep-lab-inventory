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

}





?>
