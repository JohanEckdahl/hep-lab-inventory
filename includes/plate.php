<?php
require_once ("initialize.php");

class Plate extends Component {

	//MySQL Table	
	protected static $table_name='plate';
	public $identifier;
	public $material;
	public $nom_thickness;	
	public $min_thickness;
  	public $max_thickness;
  	public $flatness;
  	public $kapton;
  	public $size;
	public $manufacturer;

	protected static $form = array(
		'id' => 'null',
		'identifier' => 'NCU ',
		'material' => 'CuW',
		'nom_thickness' => '1.2',
		'min_thickness' => '',
		'max_thickness' => '',
		'flatness' 		=> '',
		'kapton'		=> 'n',
		'size'			=> '6',
		'manufacturer'  => 'NCU',
	);
		



	//Web Table Display Arrays	
	public static $table_header=array('Plate ID', 'Identifier', 'Material', 'Nom Thickness', 'Min  Thickness', 'Max Thickness', 'Flatness', 'Kapton', 'Size', 'Manufacturer', 'Module ID', 'Location');
	public static $table_attributes
= array('id', 'identifier', 'material', 'nom_thickness', 'min_thickness', 'max_thickness', 'flatness', 'kapton', 'size', 'manufacturer', 'module_id', 'location');


}//Class Brace




?>

