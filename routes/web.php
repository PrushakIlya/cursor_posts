<?php

/** @var Framework\Router $router */

$router->get('/', 'HomeController@index');
$router->get('/categories', 'CategoryController@index');
$router->get('/category/{id}/posts', 'CategoryController@posts');
$router->get('/post/{id}', 'PostController@show');
