<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">

<?php
//This Document Provides for the table Style Pages

require_once("../../includes/initialize.php");
$session->protect_page();


//Check for URL Modifier, if not direct back to index.php
if (isset($_GET['name'])){
    $object_name = ucfirst($_GET['name']);
	$onlc = strtolower($_GET['name']);
}

//Check for 'Value' and 'Item' and call either
// find_all or find_by_attribute
if ($_GET['number'] != 0){
	$number=$_GET['number'];
}else{
	$number = 1;
}

if (isset($_GET['action'])){
	$action=$_GET['action'];
}

if (isset($_GET['id'])){
	$id=$_GET['id'];
}


echo "<h1>{$object_name}</h1>";
if($action == 'insert'){
	$object_name::insert_form_generator($id, $number);
}else{
	$object_name::update_form_generator($id, $number);
}
?>

