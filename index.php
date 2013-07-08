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
require_once 'lib/loader.php';
require_once  'lib/Router.php';
/**
 * Examples:
 * '/' => 'index',
 *  '/(?P<number>\d+)' => 'index' ---- $request['number']
 * '/(\d+)' => 'index' --- $request[1]
 * '/article/[a-zA-Z0-9]+.html' => 'article'
 * '/about.html' => 'about'
 */
$urls = array(
    '/' => 'Page_IndexController',
    '/heroes' => 'Hero_AllController',
    '/guestbook' => 'Page_GuestbookController',
    '/hero/(\d+)' => 'Hero_IndexController',
    '/fight/(\d+)/(\d+)'=>'Battle_FightController',
    '/battle/(\d+)' => 'Battle_IndexController',

    '/comments/battle/(\d+)' => 'Comments_BattleController',

    '/admin_panel' => 'Admin_IndexController',
    '/admin/create_batles' => 'Admin_CreatebattlesController',
    '/admin/hero/edit/(\d+)' => 'Admin_HeroeditController',
    '/admin/hero/add' => 'Admin_HeroaddController',
    '/best'=>'Doter_ListController',
    '/player/vote/(?P<id>\d+)' =>'Doter_VoteController',
    '/player/(?P<id>\d+)' =>'Doter_PlayerController',
    '/comments/doter/(\d+)' => 'Comments_DoterController',
    
);
try {
    echo Router::stick($urls);
} catch (Exception $e) {
    Error_Error404::show($e->getMessage());
}
 
