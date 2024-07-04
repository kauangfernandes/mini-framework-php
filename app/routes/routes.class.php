<?php

    class Routes{
        protected static array $routes = array();
        protected static string $method = "";
        protected static string $path = "";

        public static function getRoutes(){
            return self::$routes;
        }

        public static function get(string $path, array $dados){
            self::$routes['GET'][$path] = $dados;
        }

        public static function post(string $path, array $dados){
            self::$routes['POST'][$path] = $dados;
        }

        public static function runRoutes(){
            $server = Server::getInstancia();

            self::$method = $server->getMethodHttp();
            self::$path = $server->getPathHtpp();

            if(isset(self::$routes[self::$method][self::$path])){
                return self::$routes[self::$method][self::$path];
            } else {
                return exit("Rota não conhecida.");
            }
        }

        public static function startInstance(){
            $route = self::runRoutes();
            $controller = $route[0];
            $action = $route[1];
            $controller = new $controller;
            $controller->$action();
        }
    }

    require_once "web/web.php";
?>