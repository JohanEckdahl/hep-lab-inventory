<?php
require_once ("initialize.php");

class Plate extends Component {

	//MySQL Table	
	protected static $table_name='plate';
	public $material;
	public $nom_thickness;	
	public $min_thickness;
  	public $max_thickness;
  	public $flatness;
  	public $kapton;
  	public $size;
	public $manufacturer;



	//Web Table Display Arrays	
	public static $table_header=array('Plate ID', 'Material', 'Nom Thickness', 'Min  Thickness', 'Max Thickness', 'Flatness', 'Kapton', 'Size', 'Manufacturer', 'Module ID', 'Location');
	public static $table_attributes
= array('id', 'material', 'nom_thickness', 'min_thickness', 'max_thickness', 'flatness', 'kapton', 'size', 'manufacturer', 'module_id', 'location');


}//Class Brace




?>

