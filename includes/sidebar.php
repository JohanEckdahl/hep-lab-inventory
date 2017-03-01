<?php

// Edit $names and $urls

$names = array("Modules", "Sensors", "PCBs", "Plates", "Shipments");

$urls = array("table.php?name=module", "table.php?name=sensor", "table.php?name=pcb", "table.php?name=plate", "table.php?name=shipment");


$links = array_combine($names, $urls);
?>


<table cellspacing="5" cellpadding ="8">

<?php
foreach ($links as $value=>$key){
echo  "<tr><td align='left'><a href={$key}>{$value}</a>";
}
?>


</table>
