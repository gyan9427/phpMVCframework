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

   public function showAll(){
     $variable = $this->routes;
     foreach ($variable as $key => $value) {
       echo "</br>";
       echo $value;
     }
   }

   public  function resolve()
   {
      $path =$this->request->getPath();

      $method = $this->request->getMethod();
      $callback = $this->routes[$method][$path] ?? false;

      if ($callback === false){
        Application::$app->response->setStatusCode(404);
        return $this->renderView("_404");
        
      }

      if (is_string($callback)){
        return $this->renderView($callback);
      }
      
      return call_user_func($callback);
   }

   public function renderView($view)
   {
     $layoutContent = $this->layoutContent();
     
     $viewContent = $this->renderViewOnly($view);

     $content =str_replace("{{content}}",$viewContent,$layoutContent);
     return $content;
    //  include_once Application::$ROOT_DIR."/views/$view.php";
   }

   protected function layoutContent()
   {
     ob_start();
     include_once Application::$ROOT_DIR."/views/layouts/main.php";
     return ob_get_clean();
   }

   protected function renderViewOnly($view)
   {
     ob_start();
     include_once Application::$ROOT_DIR."/views/$view.php";
     return ob_get_clean();

   }
 }