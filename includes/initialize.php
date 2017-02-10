<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
	define('SITE_ROOT', '/var/www/html/webpages');

defined('LIB_PATH') ? null :
	define('LIB_PATH', SITE_ROOT.'/includes');



require_once (LIB_PATH."/database.php");
require_once (LIB_PATH."/functions.php");
//require_once (LIB_PATH."/session.php");
//require_once (LIB_PATH."/user.php");
require_once ("config.php");
require_once (LIB_PATH."/databaseobject.php");

?>

