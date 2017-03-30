<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>


This area is where forms will be.


</br>

<a href="./logout.php">Logout</a>

