<?php

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
	$header = $object_name::return_table_header_html($objects);
//Print Column Names
	$column_names = $object_name::return_table_column_name_html($object_name);
//Print Attributes
	$attributes = $object_name::return_table_attributes_html($objects);


$sidebar = require_once("../../includes/sidebar.php");

$database->close_connection();

require_once('table_template.php');
?>

