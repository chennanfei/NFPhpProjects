<?php
// define global variables
defined('SITE_ROOT_PATH') || define('SITE_ROOT_PATH', realpath(dirname(__FILE__) ));
defined('APPLICATION_ROOT_PATH') || define('APPLICATION_ROOT_PATH', SITE_ROOT_PATH . '/application');

// include code path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(SITE_ROOT_PATH . '/application'),
    realpath(SITE_ROOT_PATH . '/lib'),
    get_include_path(),
)));

// set timezone
date_default_timezone_set('Asia/Shanghai');

require_once 'context/NFApplicationContext.php';
(new NFApplicationContext)->run();
?>
