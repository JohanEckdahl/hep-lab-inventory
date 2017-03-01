<?php
require_once ("initialize.php");

class Shipment extends DatabaseObject {

	// MySQL Table
	protected static $table_name = 'shipment';
	public $actor;
	public $recipient;	
	public $date;
	
	//Extra Attributes
	// none other than those from parent for now	


	//Web Table Display Arrays
	public static $table_header=array('Shipment ID', 'From', 'To', 'Date');
	public static $table_attributes= array('id', 'actor', 'recipient', 'date');

}





?>

