<?php

namespace app\core;

/**
 * Class Application
 * 
 * @author gyan
 * @package app\core;
 */

 class Router
 {
   public Request $request;
   protected array $routes = [];

   /**
    * Router  constructor.
    *
    * @param \app\core\Request $request
    */
    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

   public function get($path, $callback)
   {
       $this->routes['get'][$path] = $callback ;
   }

   public function post($path,$callback)
   {
     $this->routes['post'][$path]= $callback;
   }

   public  function resolve()
   {
      $path =$this->request->getPath();

      $method = $this->request->getMethod();
      $callback = $this->routes[$method][$path] ?? false;

      if ($callback === false){
        echo "not found";
        exit;
      }

      if (is_string($callback)){
        return $this->renderView($callback);
      }

      echo call_user_func($callback);
   }

   public function renderView($view)
   {
     include_once Application::$ROOT_DIR."/views/$view.php";
   }
 }