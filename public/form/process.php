<?php
include_once("../../includes/initialize.php");
$object_name= $_GET['name'];

//$action = $_GET['action'];
$action = 'update';
	foreach ($_POST as $array){
		$object_name::$action($array);
	}

redirect_to("../inventory/table.php?name={$object_name}");

?>

