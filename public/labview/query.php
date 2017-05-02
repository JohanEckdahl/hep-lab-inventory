<?php 

require_once("../../includes/initialize.php");

if(isset($_GET['tray_number'])){
	$tray_number = $_GET['tray_number'];
}

$objects = Module::find_by_attribute("location", $tray_number );

foreach($objects as $object){
	echo $object->id."\n";
	echo $object->position."\n";
	echo $object->thickness."\n";
	echo $object->top_layer."\n";
}

print_r(array(1,2,3,4));

?>
