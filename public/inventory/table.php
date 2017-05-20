<?php
//This Document Provides for the table Style Pages
require_once("../../includes/initialize.php");
//Check for URL Modifier, if not direct back to index.php
if (isset($_GET['name'])) {
    $object_name = ucfirst($_GET['name']);
	$onlc = strtolower($_GET['name']);
}else{
        header( 'Location: ./index.php');
        exit();
}
//Check for 'Value' and 'Item' and call either
// find_all or find_by_attribute
if (isset($_GET['item']) && isset($_GET['value'])){
	$objects=$object_name::find_by_attribute($_GET['item'], $_GET['value']);
}else{
	$objects=$object_name::find_all();
}
// Print table header
	$header = $object_name::print_table_header($objects);
//Print Column Names
	$column_names = $object_name::print_table_column_names($object_name);
//Print Attributes
	$attributes = $object_name::print_table_attributes($objects);
//Print Extra Info	
	$extra_info = $object_name::print_extra_info(array_pop($objects));
	$sidebar= require_once("../../includes/sidebar.php");

$database->close_connection();

require_once('table_template.php');
?>

