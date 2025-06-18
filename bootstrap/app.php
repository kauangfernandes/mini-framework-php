<?php
    namespace Bootstrap;
    require_once __DIR_BOOTSTRAP__."autoload\autoloader.php";

    class App {
        public static function run(){
            \Bootstrap\Autoload\Autoloader::run();
            \Bootstrap\Addons\PhpEnv::run(__DIR_BASE__ . "\\.env");
            \Bootstrap\Router\Route::run();
            return null;
        }
    }
?>