<?php
require_once ("initialize.php");

class Sensor extends Component {

	// MySQL Table
	protected static $table_name = 'sensor';
	public $identifier;
	public $type;
	public $size;	
	public $channels;
	public $manufacturer;
	
	//Extra Attributes
	// none other than those from parent for now	


	//Web Table Display Arrays
	public static $table_header=array('Sensor ID', 'Identifier', 'Type', 'Size', 'Channels', 'Manufacturer', 'Module ID', 'Location');
	public static $table_attributes= array('id', 'identifier', 'type', 'size', 'channels', 'manufacturer', 'module_id', 'location');


}
?>

