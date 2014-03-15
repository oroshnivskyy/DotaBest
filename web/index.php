<?php
if (in_array(
        @$_SERVER['REMOTE_ADDR'],
        array('127.0.0.1', '::1')
    ) || (isset($_GET['debug_enabled']) && $_GET['debug_enabled'] == 1)
) {
    if (!isset($_GET['debug_enabled'])) {
        define('BASE_PATH', __DIR__);
    } else {
        define('BASE_PATH', dirname(__DIR__));
    }
    DEFINE('DEBUG', true);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    define('start_time', microtime(true));
} else {
    define('BASE_PATH', __DIR__);

    DEFINE('DEBUG', false);
}
require 'vendor/autoload.php';
$container = new \Illuminate\Container\Container();
$container->offsetSet('app_folder', 'app'.DIRECTORY_SEPARATOR);
$container->offsetSet('config_folder', $container->offsetGet('app_folder').'config'.DIRECTORY_SEPARATOR);
$container->offsetSet('templates_folder', $container->offsetGet('app_folder').'templates'.DIRECTORY_SEPARATOR);
$container = require $container->offsetGet('config_folder').'container.php';

try {
    $router = $container->make('router');
    echo $router->stick();
} catch (Exception $e) {
    \Error\Error404::show($e->getMessage());
}
 
