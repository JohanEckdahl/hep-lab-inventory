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
	public $kapton;
	
	protected static $form = array(
		'id' => 'null',
		'thickness' => '',
		'sensor_id' => '',
		'pcb_id'	=> '',
		'plate_id'	=> '',
		'barcode'	=> '',
		'tray_number'	=> '',
		'position'	=> '',
		'kapton' => '',
	);

	//Extra Attributes
	// none	


	//Web Table Display Arrays
	public static $table_header=array('Module ID', 'Top Layer', 'Sensor ID', 'PCB ID', 'Plate ID', 'Thickness', 'Location', );
	public static $table_attributes= array('id', 'top_layer', 'sensor_id', 'pcb_id', 'plate_id', 'thickness', 'location', );



	//Methods
	public static function print_extra_info($object){
		parent::print_extra_info($object);
		$components=array('sensor', 'pcb', 'plate');
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
		if($top_layer == 1){
			if($object->kapton == 'y'){
				$top_layer= 'kapton';
			}else{
				$top_layer='plate';
			}
		}elseif($top_layer == 2){
			$top_layer = 'sensor';
		}else{
			$top_layer='pcb';
		}
		return $top_layer;
	}
}



?>
