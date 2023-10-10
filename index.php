<?php

include_once('inc.php');

define('BASE_PATH', __DIR__);
define('BASE_PATH_CONTROLLERS', __DIR__ . '/controllers');
define('BASE_PATH_CLASSES', __DIR__ . '/classes');
define('BASE_PATH_VIEWS', __DIR__ . '/views');
define('BASE_PATH_LANGUAGES', __DIR__ . '/languages');

$app = new classes\Application();
$app->begin();
