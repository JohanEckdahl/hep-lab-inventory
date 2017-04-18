<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">

<?php
//This Document Provides for the table Style Pages

require_once("../../includes/initialize.php");

//Check for URL Modifier, if not direct back to index.php
if (isset($_GET['name'])){
    $object_name = ucfirst($_GET['name']);
	$onlc = strtolower($_GET['name']);
}

//Check for 'Value' and 'Item' and call either
// find_all or find_by_attribute
if (isset($_GET['number'])){
	$number=$_GET['number'];
}

$object_name::form_generator($number);

?>

