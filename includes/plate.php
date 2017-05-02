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
		'size'			=> '6',
		'manufacturer'  => 'NCU',
	);
		



	//Web Table Display Arrays	
	public static $table_header=array('Plate ID',  'Module ID', 'Identifier', 'Material', 'Nom Thickness', 'Min  Thickness', 'Max Thickness', 'Flatness', 'Size', 'Manufacturer', 'Location');
	public static $table_attributes
= array('id', 'module_id', 'identifier', 'material', 'nom_thickness', 'min_thickness', 'max_thickness', 'flatness', 'size', 'manufacturer', 'location');


}//Class Brace




?>

