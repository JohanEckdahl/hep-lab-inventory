<?php
require_once ("initialize.php");

class pcb extends Component {

	//MySQL Table
	protected static $table_name = 'pcb';	
	public $identifier;
	public $thickness;
	public $flatness;
	public $size;
	public $channels;	
	public $bonded_skirocs;	
	public $manufacturer;


	//Web Table Display Arrays
	public static $table_header = array('PCB ID', 'Identifier', 'Thickness', 'Flatness', 'Size', 'Channels', 'Bonded Skirocs', 'Manufacturer', 'Module ID', 'Location');
	public static $table_attributes= array('id', 'identifier', 'thickness', 'flatness', 'size', 'channels', 'bonded_skirocs', 'manufacturer', 'module_id', 'location');

}

?>

