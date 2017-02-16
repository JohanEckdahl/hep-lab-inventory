<?php
//This Document Provides for the table Style Pages

require_once("../../includes/initialize.php");
?>





<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>
<body>
<nav>
<?php require_once('../../includes/sidebar.php'); ?>
</nav>
<section>
This is the main page!

</section>
<?php $database->close_connection(); ?>
</body>
</html>
