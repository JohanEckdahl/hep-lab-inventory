<?php

// Edit $names and $urls

$names = array("Modules", "Sensors", "PCBs", "Plates", "Shipments", "Comments");

$urls = array("module", "sensor", "pcb", "plate", "shipment", "comment");

$links = array_combine($names, $urls);
?>


<?php
$html='<table><h3><center>Menu</center></h3>';
foreach ($links as $value=>$key){

$html.= "<tr><td><a href=table.php?name={$key}>{$value}</a></td></tr>";
}
$html.= "<tr><td><a href=../admin/index.php>".$session_link."</a></td></tr></table>";
return $html;
?>

</table>
