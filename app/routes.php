<?php
/**
 * Examples:
 * '/' => 'index',
 *  '/(?P<number>\d+)' => 'index' ---- $request['number']
 * '/(\d+)' => 'index' --- $request[1]
 * '/article/[a-zA-Z0-9]+.html' => 'article'
 * '/about.html' => 'about'
 */
return [
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

];