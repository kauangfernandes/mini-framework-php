<?php

    class Route{

        private static array $routes = array();
        private static string $method = "";
        private static string $path = "";

        public function __construct(){}

        private static function getRoutes(){
            return self::$routes;
        }

        public static function getHttp(string $path, array $controllerAction){
            self::$routes['GET'][$path] = $controllerAction;
        }

        public static function postHttp(string $path, array $controllerAction){
            self::$routes['POST'][$path] = $controllerAction;
        }

        private static function runRoutes(){
            $server = new Server;

            self::$method = $server->getMethodHttp();
            self::$path = $server->getPathHtpp();

            if(isset(self::$routes[self::$method][self::$path])){
                return self::$routes[self::$method][self::$path];
            } else {
                return exit("Rota não conhecida.");
            }
        }

        public static function startInstancia(){
            $route = self::runRoutes();
            $controller = $route[0];
            $action = $route[1];
            $controller = new $controller;
            $controller->$action();
        }
    }
?>