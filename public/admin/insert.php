
<?php

require_once("../../includes/initialize.php");

$data = $_POST['data'];
DatabaseObject::insert($data);


header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

?>

