<?php
    namespace App\Core;
    
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

        public function getPathHtppRequest(){
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $path = substr($path, strpos($path, "/", 1));
            $path_public = __DIR_PUBLIC__ ."/";
            $path = str_replace($path_public, "", $path);
            return $path;
        }

        public function getServerNameHttp(){
            return $_SERVER['SERVER_NAME'];
        }

        public function getServerPortHttp(){
            return $_SERVER['SERVER_PORT'];
        }

        public function getDocumentroot(){
            return $_SERVER['DOCUMENT_ROOT'];
        }
    }
?>