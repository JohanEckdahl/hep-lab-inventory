<?php

require_once("../../includes/initialize.php");


$table = 'sensor';
$key = 1;
$user_id = 1;
$body = "hi";
$keys = array ("item_table", "table_key", "user_id", "body");		
$values = array($table, $key, $user_id, $body);
$assoc = array_combine($keys, $values);
Comment::insert($assoc);


?>






