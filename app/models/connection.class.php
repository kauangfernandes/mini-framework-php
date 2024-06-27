<?php
    namespace App\Models;
    
    class connection{
        private static $db;

        private function __construct(){}

        public static function getInstancia(){
            if(empty(self::$db)){
                try {
                    $host = 'localhost';
                    $dbname = 'framework';
    
                    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
                    $usuario = 'root';
                    $senha = '';
        
                    self::$db = new PDO($dsn, $usuario, $senha);
                } catch (PDOException $e) {
                    echo "Erro na conexãor: {$e->getCode()}<br>Mensagem: {$e->getMessage()}";
                    die();
                }
            }
            return self::$db;
        }
    }
?>