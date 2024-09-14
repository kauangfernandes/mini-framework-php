<?php
    namespace App\Core;
    
    class Connection{
        private static $db;

        private function __construct(){}

        public static function getInstancia(){
            if(empty(self::$db)){
                try {
                    $host = 'localhost';
                    $dbname = 'framework';
    
                    $args = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
                    $user = 'root';
                    $password = '';
        
                    self::$db = new \PDO($args, $user, $password);
                } catch (\PDOException $e) {
                    echo "Erro na conexãor: {$e->getCode()}<br>Mensagem: {$e->getMessage()}";
                    die();
                }
            }
            return self::$db;
        }
    }
?>