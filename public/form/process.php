<?php
include_once("../../includes/initialize.php");


$object_name= $_GET['name'];

$action = $_GET['action'];
	foreach ($_POST as $array){
		$object_name::$action($array);
	}

header("Location: ../inventory/table.php?name={$object_name}" ) ;


//redirect_to("../inventory/table.php?name={$object_name}");

?>

