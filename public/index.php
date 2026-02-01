<?php

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/framework/bootstrap.php';

$container = new Framework\Container();
$container->singleton(\Framework\Database\Connection::class, function () {
    $config = require ROOT_PATH . '/config/database.php';
    return new \Framework\Database\Connection($config);
});

$router = new Framework\Router();
$router->setControllerNamespace('App\\Controllers');

require ROOT_PATH . '/routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($method, $uri, $container);
