<?php
    class Autoloader {
        public static function register(){
            spl_autoload_register(
                function($className){

                    if(file_exists("../app/controllers/".$className.".class.php")){
                        require_once  "../app/controllers/" . $className . '.class.php';
                    }
                    
                    if (file_exists("../app/routes/".$className.".class.php")){
                        require_once  "../app/routes/" . $className . '.class.php';
                    }

                    if (file_exists("../app/models/server/".$className.".class.php")){
                        require_once  "../app/models/server/" . $className . '.class.php';
                    }
                    
                    if(file_exists("../app/models/".$className.".class.php")){
                        require_once  "../app/models/" . $className . '.class.php';
                    }

                    if(file_exists("../app/core/".$className.".class.php")){
                        require_once  "../app/core/" . $className . '.class.php';
                    }
                    
                }
            );
        }
    }
?>