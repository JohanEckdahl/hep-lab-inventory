<?php
require_once ("initialize.php");

class Shipment extends DatabaseObject {

	// MySQL Table
	protected static $table_name = 'shipment';
	public $actor;
	public $recipient;	
	public $date;

	protected static $form = array(
		'id' => 'null',
		'actor' => '',
		'recipient' => '',
		'date' => 'null',
	);
	
	//Extra Attributes
	// none other than those from parent for now	


	//Web Table Display Arrays
	public static $table_header=array('Shipment ID', 'From', 'To', 'Date');
	public static $table_attributes= array('id', 'actor', 'recipient', 'date');


	public static function print_extra_info($object){
		parent::print_extra_info($object);
		static::print_table_column_names('ShippedItem');
		static::print_table_attributes(ShippedItem::find_by_attribute('shipment_id', $object->id));
		echo "<hr>";	
	}


}





?>

