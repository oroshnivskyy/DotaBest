<?php

define('start_time', microtime(true));
define('BASE_PATH', dirname(__DIR__));
if (in_array(@$_SERVER['REMOTE_ADDR'], array(
            '127.0.0.1',
            '::1',
        ))) {
    DEFINE('DEBUG', TRUE);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    DEFINE('DEBUG', FALSE);
}
require_once __DIR__ . '/../lib/loader.php';
require_once __DIR__ . '/../lib/Router.php';
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

);
try {
    echo Router::stick($urls);
} catch (Exception $e) {
    echo $e->getMessage();
}
 
