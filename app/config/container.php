<?php
$container->singleton(
    'router',
    function ($container) {
        return new Router(include $container->offsetGet('app_folder').'routes.php', $container);
    }
);
$dbConfig = include $container->offsetGet('config_folder').'database.php';

$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
$conn = $connFactory->make($dbConfig);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
return $container;