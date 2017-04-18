<?php
include_once("../../includes/initialize.php");
$object_name= $_GET['name'];
print_r($_POST);
	foreach ($_POST as $array){
		$object_name::insert($array);
	}

redirect_to("../inventory/table.php?name={$object_name}");

?>

