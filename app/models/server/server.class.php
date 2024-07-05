<?php
    class Server{
        public function __construct(){}

        public function getServerAll(){
            return $_SERVER;
        }

        public function getMethodHttp(){
            return $_SERVER['REQUEST_METHOD'];
        }

        public function getPathHtpp(){
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $path = substr($path, strpos($path, "/", 1));
            return $path;
        }

        public function getServerNameHttp(){
            return $_SERVER['SERVER_NAME'];
        }

        public function getServerPortHttp(){
            return $_SERVER['SERVER_PORT'];
        }
        
    }

?>