<?php
    
    Class Autoload{

        public static function Register(){
            spl_autoload_register(
                function($className){
                    if(file_exists("../app/controllers/".$className.".class.php")){
                        require_once  "../app/controllers/" . $className . '.class.php';
                    } else if (file_exists("../app/routes/".$className.".class.php")){
                        require_once  "../app/routes/" . $className . '.class.php';
                    } else if (file_exists("../app/models/server/".$className.".class.php")){
                        require_once  "../app/models/server/" . $className . '.class.php';
                    } else {
                        require_once  "../app/models/" . $className . '.class.php';
                    }
                }
            );
        }
    }
?>