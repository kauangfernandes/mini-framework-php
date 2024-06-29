<?php
    
    Class Autoload{

        public static function Register(){
            spl_autoload_register(

                function($className){
        
                    if(file_exists("controllers/".$className.".class.php")){
        
                        require_once  "../app/controllers/" . $className . '.class.php';
        
                    } else {
        
                        require_once  "../app/models/" . $className . '.class.php';
        
                    }
        
                }
            );
        }

    }
?>