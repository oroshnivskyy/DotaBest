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
/**
 * Examples:
 * '/' => 'index',
 *  '/(?P<number>\d+)' => 'index' ---- $request['number']
 * '/(\d+)' => 'index' --- $request[1]
 * '/article/[a-zA-Z0-9]+.html' => 'article'
 * '/about.html' => 'about'
 */
$urls = array(
    '/' => 'Page\IndexController',
    '/heroes' => 'Hero\AllController',
    '/guestbook' => 'Page\GuestbookController',
    '/hero/(\d+)' => 'Hero\IndexController',
    '/fight/(\d+)/(\d+)'=>'Battle\FightController',
    '/battle/(\d+)' => 'Battle\IndexController',

    '/comments/battle/(\d+)' => 'Comments\BattleController',

    '/admin_panel' => 'Admin\IndexController',
    '/admin/create_batles' => 'Admin\CreatebattlesController',
    '/admin/hero/edit/(\d+)' => 'Admin\HeroeditController',
    '/admin/hero/add' => 'Admin\HeroaddController',
    '/best'=>'Doter\ListController',
    '/player/vote/(?P<id>\d+)' =>'Doter\VoteController',
    '/player/(?P<id>\d+)' =>'Doter\PlayerController',
    '/comments/doter/(\d+)' => 'Comments\DoterController',
    
);
try {
    echo Router::stick($urls);
} catch (Exception $e) {
    \Error\Error404::show($e->getMessage());
}
 
