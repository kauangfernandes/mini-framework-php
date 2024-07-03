<?php
    class Server{
        protected static $instance;
        
        private function __construct(){}

        public static function getInstancia(){
            if(is_null(self::$instance)){
                self::$instance = new Server();
            }
            return self::$instance;
        }

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