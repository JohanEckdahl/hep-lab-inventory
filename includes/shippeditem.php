<?php
require_once ("initialize.php");

class ShippedItem extends DatabaseObject {

	// MySQL Table
	protected static $table_name = 'shipped_item';
	public $shipment_id;
	public $item_table_name;	
	public $item_id;
	
	//Extra Attributes
	// none other than those from parent for now	


	//Web Table Display Arrays
	public static $table_header=array('Item', 'ID');
	public static $table_attributes= array('item_table_name', 'item_id');


}


