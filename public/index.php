<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$rootpath = dirname(__DIR__);

$app = new Application($rootpath);

$app->router->get('/','home');

$app->router->get('/contact','contact');
//This is equivalent to Router::get('/contact',function);

$app->run();