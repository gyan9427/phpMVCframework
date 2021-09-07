<?php

namespace app\controllers;

use app\core\Application;
/**
 * 
 * @author gyan
 * 
 * @package app\controllers
 */

class ContactController
{
 
    public function home(){
        $params = [
            'name'=>'gyan'
        ];
        return Application::$app->router->renderView('home');
    }

   public function contact(){
        return Application::$app->router->renderView('contact');
   }
   public function postContact(){
       echo "this is post contact";
   }
}