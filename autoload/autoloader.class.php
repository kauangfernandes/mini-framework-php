<?php
    namespace Autoload;

    class Autoloader {
        public static array $extencios = array(
            ".php",
            ".class.php"
        );

        public static function register(){
            spl_autoload_register(
                function($classNameSpace){

                    $path = strtolower($classNameSpace);
                    $path = str_ireplace("\\", "/", $path);

                    foreach (self::$extencios as $extencao) {
                        if(file_exists("../{$path}{$extencao}")){
                            $path = "../{$path}{$extencao}";
                            require_once $path;
                        }
                    }
                }
            );
        }
    }
?>