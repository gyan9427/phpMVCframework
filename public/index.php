<?php
ini_set('display_errors',1);
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controllers\ContactController;

$rootpath = dirname(__DIR__);

$app = new Application($rootpath);

$app->router->get('/',[ContactController::class,'home']);

$app->router->get('/contact',[ContactController::class,'contact']);

$app->router->post('/contact',[ContactController::class,'postContact']);
//This is equivalent to Router::get('/contact',function);
$app->run();