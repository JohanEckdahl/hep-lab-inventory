<?php
require_once ("initialize.php");

class Module extends Hardware {

	protected static $table_name = 'module';
	public $plate_id;
	public $sensor_id;
	public $pcb_id;
	public $barcode;
	public $thickness;
	public $tray_number;
	public $position;
	public $top_layer;
	
	protected static $form = array(
		'id' => 'null',
		'thickness' => '',
		'sensor_id' => '',
		'pcb_id'	=> '',
		'plate_id'	=> '',
		'barcode'	=> '',
		'tray_number'	=> '',
		'position'	=> '',
	);

	//Extra Attributes
	// none	


	//Web Table Display Arrays
	public static $table_header=array('Module ID', 'Sensor ID', 'PCB ID', 'Plate ID', 'Thickness', 'Location', 'top layer');
	public static $table_attributes= array('id', 'sensor_id', 'pcb_id', 'plate_id', 'thickness', 'location', 'top_layer');



	//Methods
	public static function print_extra_info($object){
		parent::print_extra_info($object);
		
		$components=array('sensor', 'pcb', 'plate');
		foreach($components as $component){			
			$cid=$component."_id";
			$object2 = ucfirst($component)::find_by_attribute('id', $object->$cid);		
			static::print_table_column_names($component);
			$component::print_table_attributes($object2);
			$component::print_extra_info($object2[0]);
		}
	}


	 protected static function get_extra_attributes($object){
                parent::get_extra_attributes($object);
                $object->top_layer = self::find_top_layer($object);
        }

	protected static function find_top_layer($object){
		$attributes = array('plate_id', 'sensor_id', 'pcb_id');
		$top_layer=0;	
		foreach($attributes as $att){
			if(isset($object->$att)){
				$top_layer++;
			}
		}
		return $top_layer;
	}



}



?>
