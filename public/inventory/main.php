<?php

require_once("../../includes/initialize.php");

if (isset($_GET['name'])) {
    $object_name = $_GET['name'];
}else{
        header( 'Location: ./index.php');
        exit();
}

if (isset($_GET['item']) && isset($_GET['value'])){
	$objects=$object_name::find_by_attribute($_GET['item'], $_GET['value']);
    $id_name=intval($_GET['value']);
}else{
	$objects=$object_name::find_all();
}



?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../stylesheets/main.css">
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">

<head>
<h1>
    <div class="header">
        <?php $object_name == "pcb" ? print "PCB" . " " . $id_name
              : print ucfirst(strtolower($object_name)) . " " . $id_name; ?>
              <small><small><a href="#">Images</a> | <a href="#">Data</a></small></small>
    </div>
</h1>
</head>
<body>

<!-- NAV BAR -->
<div class="navfix">
    <nav>
        <?php require_once('../../includes/sidebar.php'); ?>
    </nav>
</div>
<section>
<!-- COMPONENT FORM BELOW -->
<div class="components">
    <h2>
        Components
    </h2>
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
                    echo $html;}
                }
    echo "</table>";
    ?>
</div>

<!-- COMMENT FORM BELOW -->
<div class="comments">
    <h2>
    Comments
    </h2>
    <?php
    $objects=comment::find_by_attribute(table_key, $_GET['value']);
    //Print Headers
    if ($objects) {
    echo "<table><tr>";
    foreach (comment::$table_header as $word)
    {
    echo "<th>{$word}</th>";
    }
    echo '</tr>';
    //Print Attributes
        foreach ($objects as $object){
                echo "<tr>";
                foreach (comment::$table_attributes as $att){
                        $page = 'table';
                        $html = "<td><a href='./".$page;
                        $html .=".php?name=".'comment';
                        $html .="&item=".$att;
                        $html .= "&value=".$object->$att;
                        $html .= "'>".$object->$att."</a></td>";
                        echo $html;}
                    }} else {
                        echo "<h1>No Comments Yet</h1>";
                    }
    echo "</table>";
    ?>
</div>


</body>
</section>
</html>
<?php $database->close_connection(); ?>
