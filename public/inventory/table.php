<?php
//This Document Provides for the table Style Pages
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
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>
<body>
<nav>
<?php require_once(LIB_PATH.'/sidebar.php'); ?>
</nav>
<section>

<?php
// Print table header
	echo $object_name::print_table_header($objects);
//Print Column Names
	echo $object_name::print_table_column_names($object_name);
//Print Attributes
	echo $object_name::print_table_attributes($objects);
//Print Extra Info	
	if(count($objects)==1){
		echo $object_name::print_extra_info(array_pop($objects));
	}
?>

</section>
<?php $database->close_connection(); ?>
</body>
</html>
