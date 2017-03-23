<?php 

require_once("../includes/initialize.php");

$object = Sensor::find_by_attribute("id", 1);

echo $object[0]->id;

?>
