<?php
    namespace Autoload;

    class Autoloader {
        public static array $extensions = array(
            ".php",
            ".class.php"
        ); 


        public static function register(){

            self::$extensions = self::getExtensionsJson();

            spl_autoload_register(
                function($classNameSpace){

                    $path = strtolower($classNameSpace);
                    $path = str_ireplace("\\", "/", $path);

                    foreach (self::$extensions as $extensao) {
                        $baseDir = self::getBaseDir();
                        if(file_exists("{$baseDir}/{$path}{$extensao}")){
                            $path = "{$baseDir}/{$path}{$extensao}";
                            $path = strtolower($path);
                            require_once $path;
                        }
                    }
                }
            );
        }

        private static function getExtensionsJson(){
            try {
                $baseDir = self::getBaseDir();
                if(file_exists($baseDir."/framework.json")){
                    $json = "{$baseDir}/framework.json";
                    $json = file_get_contents($json);
                    $json = json_decode($json, TRUE);

                    if(isset($json['autoload']['extensions'])){
                        $extensions = $json['autoload']['extensions'];
                        if(empty($extensions)){
                            return null;
                        } else {
                            return $extensions;
                        }
                    } else {
                        echo "Field [extensions] is not defined.";
                    }
                    
                } else {
                    echo "Framework.json file was not found.";
                }
            } catch (\Throwable $th) {
                throw $th;
                echo "Framework.json file was not found.";
            }
        }

        private static function getBaseDir(){
            $baseDir = __DIR__;
            $baseDir = dirname($baseDir);
            return $baseDir;
        }
    }
?>