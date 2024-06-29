<?php
    class Server{
        public static function getServerAll(){
            return $_SERVER;
        }

        public static function getMethodHttp(){
            return $_SERVER['REQUEST_METHOD'];
        }

        public static function getPathHtpp(){
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $path = substr($path, strpos($path, "/", 1));
            return $path;
        }

        public static function getServerNameHttp(){
            return $_SERVER['SERVER_NAME'];
        }

        public static function getServerPortHttp(){
            return $_SERVER['SERVER_PORT'];
        }
        
    }

?>