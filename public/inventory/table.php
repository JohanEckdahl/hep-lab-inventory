<?php

require_once("../../includes/initialize.php");
$sidebar = require_once("../../includes/sidebar.php");
//Check for URL Modifier, if not direct back to index.php
if (isset($_GET['name'])) {
    $object_name = ucfirst($_GET['name']);
	$onlc = strtolower($_GET['name']);



//Check for 'Value' and 'Item' and call either
// find_all or find_by_attribute
if (isset($_GET['item']) && isset($_GET['value'])){
	$objects=$object_name::find_by_attribute($_GET['item'], $_GET['value']);
}else{
	$objects=$object_name::find_all();
}
$count = count($objects);

$header = $object_name::return_table_header_html($objects);
$column_names = $object_name::return_table_column_name_html($object_name);
$attributes = $object_name::return_table_attributes_html($objects);

if($count == 1 && $object_name != 'Comment'){
	$comment_html = $object_name::return_comment_html($objects);
	//$comment_html.= include('./commentmodal.php');

}else{$comment_html = '';}



$database->close_connection();

$content = $header.$column_names.$attributes.$comment_html;

}else{
       $content = "MySQL and PHP code for UCSB HGCAL inventory</br></br>
The code is found on github:</br>
<a href='https://github.com/JohanEckdahl/hep-lab-inventory'>UCSB Inventory GitHub</a></br></br></br>
<img src= '../images/cloudchamber.png' width=600 border=0>";
}


require_once('table_template.php');
?>

