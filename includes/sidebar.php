<?php

// Edit $names and $urls

$names = array("Modules", "Sensors", "PCBs", "Plates", "Shipments", "Comments");

$urls = array("module", "sensor", "pcb", "plate", "shipment", "comment");

$links = array_combine($names, $urls);
?>

<table cellspacing="5" cellpadding ="8" >

<?php
$html='';
foreach ($links as $value=>$key){
$html.= "<tr><td align='left'><a href=table.php?name={$key}>{$value}</a>";
}
$html.= "<tr><td align='left'><a href=../admin/index.php>".$session_link."</a>";
echo $html;
?>

</table>
