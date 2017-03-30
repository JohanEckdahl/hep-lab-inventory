<?php

require_once("config.php");

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('LIB_PATH') ? null :
        define('LIB_PATH', SITE_ROOT.'/includes');

require_once (LIB_PATH."/database.php");
require_once (LIB_PATH."/functions.php");
require_once (LIB_PATH."/session.php");
require_once (LIB_PATH."/user.php");
require_once (LIB_PATH."/databaseobject.php");

?>

