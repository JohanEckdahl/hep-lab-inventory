<?php

// Edit $names and $urls

$names = array("Modules", "Sensors", "PCBs", "Plates", "Shipments", "Comments");

$urls = array("module", "sensor", "pcb", "plate", "shipment", "comment");

$links = array_combine($names, $urls);
?>


<?php
$html='<table>';
foreach ($links as $value=>$key){

$html.= "<tr><a href=table.php?name={$key}>{$value}</a></tr>";
}
$html.= "<tr><a href=../admin/index.php>".$session_link."</a></tr></table>";
return $html;
?>

</table>
