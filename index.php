<?php
if($_SERVER['REMOTE_ADDR']=='80.91.190.163'){
    header('Location: http://dota2.ru');
    exit;
}
if (in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1','::1'))||(isset($_GET['debug_enabled'])&&$_GET['debug_enabled']==1)) {
    if(!isset($_GET['debug_enabled'])){
        define('BASE_PATH', __DIR__);
    }else{
        define('BASE_PATH', dirname(__DIR__));
    }
    DEFINE('DEBUG', TRUE);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    define('start_time',microtime(true));
} else { //var_dump(__DIR__);die;
    define('BASE_PATH', __DIR__);

    DEFINE('DEBUG', FALSE);
}
require 'vendor/autoload.php';
$container = new \Illuminate\Container\Container();
$dbConfig = include 'app/config/database.php';

$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
$conn = $connFactory->make($dbConfig);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
$urls = include 'app/routes.php';
try {
    echo Router::stick($urls, $container);
} catch (Exception $e) {
    \Error\Error404::show($e->getMessage());
}
 
