<?php
//This Document Provides for the table Style Pages

require_once("../../includes/initialize.php");

//Check for URL Modifier, if not direct back to index.php
if (isset($_GET['name'])) {
    $object_name = $_GET['name'];
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
<?php require_once('../../includes/sidebar.php'); ?>
</nav>
<section>

<?php
// Print table header
	$object_name::print_table_header($object_name);
	echo "<p align=right>".count($objects)." results</p>";
	echo "<hr>";
//Print Headers
	$object_name::print_table_column_names($object_name);
//Print Attributes
	$object_name::print_table_attributes($objects);
?>

</section>
<?php $database->close_connection(); ?>
</body>
</html>
