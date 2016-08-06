<?php

define('DEBUG_MODE', 0);
defined('DEBUG_MODE') || define('DEBUG_MODE', 1);

$db_host = 'localhost:3306';
$db_user = 'root';
$db_passw = 'root';
$db_name = 'wnet_test_task';

define('DOCUMENT_ROOT', $_SERVER["DOCUMENT_ROOT"]);
define('DIR_PROJECT', 'wnet');
define('PATH_PROJECT', DOCUMENT_ROOT.'/'.DIR_PROJECT);
define('URL_PROJECT', 'http://localhost:8080/'.DIR_PROJECT);

define('DIR_TEMPLATES', 'templates');
define('PATH_TEMPLATES', PATH_PROJECT.'/'.DIR_TEMPLATES);

define('DIR_FUNCTIONS', 'functions');
define('PATH_FUNCTIONS', PATH_PROJECT.'/'.DIR_FUNCTIONS);

define('DIR_CLASSES', 'classes');
define('PATH_CLASSES', PATH_PROJECT.'/'.DIR_CLASSES);

define('DIR_JS', 'js');
define('PATH_JS', PATH_PROJECT.'/'.DIR_JS);
define('URL_JS', URL_PROJECT.'/'.DIR_JS);
