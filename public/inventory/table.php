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

//Print Headers
		echo "<table><tr>";
		foreach ($object_name::$table_header as $word)
		{
		echo "<th>{$word}</th>";
		}
		echo '</tr>';

//Print Attributes

	$objects=$object_name::find_all();

	foreach ($objects as $object){
			echo "<tr>";
			foreach ($object_name::$table_attributes as $item){
		    if ($object_name == "module"){
			switch($item) {
			    case "id":
				echo "<td> <a href = \"main.php?hardware=module&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "sensor_id":
				echo "<td> <a href = \"main.php?hardware=sensor&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "pcb_id":
				echo "<td> <a href = \"main.php?hardware=pcb&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "plate_id":
				echo "<td> <a href = \"main.php?hardware=plate&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			}
		    } elseif ($object_name == "pcb") {

			switch($item) {
			    case "id":
				echo "<td> <a href = \"main.php?hardware=pcb&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "module_id":
				echo "<td> <a href = \"main.php?hardware=module&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    default:
				echo "<td>".$object->$item."</td>";
				break;
			}
		    } elseif ($object_name == "sensor") {

			switch($item) {
			    case "id":
				echo "<td> <a href = \"main.php?hardware=sensor&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "module_id":
				echo "<td> <a href = \"main.php?hardware=module&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    default:
				echo "<td>".$object->$item."</td>";
				break;
			}
		    } elseif ($object_name == "plate") {

			switch($item) {
			    case "id":
				echo "<td> <a href = \"main.php?hardware=plate&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    case "module_id":
				echo "<td> <a href = \"main.php?hardware=module&id=".$object->$item."\">". $object->$item ."</a> </td>";
				break;
			    default:
				echo "<td>".$object->$item."</td>";
				break;
			}
		    } else {
			echo "<td>". $object->$item ."</td>";
		    }
		}
	}
?>

</section>
<?php $database->close_connection(); ?>
</body>
</html>
