<?php

namespace app\core;

use app\core\Router;

/**
 * Class Application
 * 
 * @author gyan
 * @package app\core;
 */

 class Application
 {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
     public function __construct($path)
     {
        
        self::$ROOT_DIR = $path;
        self::$app = $this;                        
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
     }

     public function run()
     {
        echo $this->router->resolve();
     }


 }