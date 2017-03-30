<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
You are logged in.
</br>
<a href="./logout.php">Logout</a>

