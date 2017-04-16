<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("login.php");
}else{redirect_to("../inventory");}
?>
You are logged in.
</br>
<a href="./logout.php">Logout</a>

