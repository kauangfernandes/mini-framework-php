<?php

    class Routes{

        public function __construct(
            private array $routes = array(),
            private string $method = "",
            private string $path = ""
        ){
            $this->initRoutes();
            $this->startInstancia();
        }

        private function getRoutes(){
            return $this->routes;
        }

        private function getHttp(string $path, array $dados){
            $this->routes['GET'][$path] = $dados;
        }

        private function postHttp(string $path, array $dados){
            $this->routes['POST'][$path] = $dados;
        }

        private function initRoutes(){
            $this->getHttp("/", [indexController::class, "index"]);
            //$this->getHttp("/login", [exemploController::class, "login"]);
            //$this->postHttp("/validar_login", [exemploController::class, "Altenticar"]);
        }

        private function runRoutes(){
            $server = new Server;

            $this->method = $server->getMethodHttp();
            $this->path = $server->getPathHtpp();

            if(isset($this->routes[$this->method][$this->path])){
                return $this->routes[$this->method][$this->path];
            } else {
                return exit("Rota não conhecida.");
            }
        }

        private function startInstancia(){
            $route = $this->runRoutes();
            $controller = $route[0];
            $action = $route[1];
            $controller = new $controller;
            $controller->$action();
        }
    }
?>