<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$app = new Application();

$app->router->get('/',function(){
    return "<h1>Hello</h1>";
});

$app->router->get('/contact',function(){
    return "<h1>Contact</h1>";
});
//This is equivalent to Router::get('/contact',function);

$app->run();