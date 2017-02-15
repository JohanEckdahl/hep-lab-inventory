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
        $item = $_GET['item'];
        $value = $_GET['value'];
        $objects=$object_name::find_by_attribute($item, $value);
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

//Print Headers
                echo "<table><tr>";
                foreach ($object_name::$table_header as $word)
                {
                echo "<th>{$word}</th>";
                }
                echo '</tr>';

//Print Attributes


        foreach ($objects as $object){
                echo "<tr>";
                foreach ($object_name::$table_attributes as $att){
                        $att == "id" ? $page = 'main' : $page = 'table';
			$html = "<td><a href='./".$page;
			$html .=".php?name=".$object_name; 
			$html .="&item=".$att;
                        $html .= "&value=".$object->$att;
                        $html .= "'>".$object->$att."</a></td>";
                        echo $html;
        }
}
?>

</section>
<?php $database->close_connection(); ?>
</body>
</html>
