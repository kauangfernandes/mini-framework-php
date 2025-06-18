<?php
    namespace Bootstrap\Helpers;
    class Helper {
        public static function view() {
            return printf("Hello World");
        }

        public static function run(){
            if(!function_exists('view')){

            }
        }
    }
?>