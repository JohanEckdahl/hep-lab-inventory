<?php 

require_once("../../includes/initialize.php");

if(isset($_GET['tray_number'])){
	$tray_number = $_GET['tray_number'];

	$objects = Module::find_by_attribute('tray_number', $tray_number );

	foreach($objects as $object){
		echo $object->id.",";
		echo $object->position.",";
		echo $object->thickness.",";
		echo $object->top_layer.",";
	}
}else{
	echo "needs tray number";
}




?>
