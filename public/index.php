<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$app = new Application();

$app->router->get('/','home');

$app->router->get('/contact','contact');
//This is equivalent to Router::get('/contact',function);

$app->run();