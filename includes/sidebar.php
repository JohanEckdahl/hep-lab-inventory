<?php

// Edit $names and $urls

$names = array("Modules", "Sensors", "PCBs", "Plates", "Shipments", "Comments");

$urls = array("module", "sensor", "pcb", "plate", "shipment", "comment");

$links = array_combine($names, $urls);
?>

<table cellspacing="5" cellpadding ="8" >

<?php
foreach ($links as $value=>$key){
echo  "<tr><td align='left'><a href=table.php?name={$key}>{$value}</a>";
}
?>


</table>
