<?php
    namespace Bootstrap\App;

    class Db {
        private static $db;

        public static function run(){
            if(empty(self::$db)){
                try {
                    $host = getenv('DB_HOST') ?? 'localhost';
                    $dbname = getenv('DB_NAME') ?? 'framework';
                    $user = getenv('DB_USER') ?? 'root';
                    $password = getenv('DB_PASSWORD') ?? '';
    
                    $args = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
  
        
                    self::$db = new \PDO($args, $user, $password);
                } catch (\PDOException $e) {
                    echo "Connection error: {$e->getCode()}<br>Message: {$e->getMessage()}";
                    die();
                }
            }
            return self::$db;
        }
    }
    
?>