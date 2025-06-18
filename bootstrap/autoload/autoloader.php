<?php

namespace Bootstrap\Autoload;

class Autoloader
{
    public static function run()
    {
        spl_autoload_register(
            function ($classNameSpace) {
                $path = strtolower($classNameSpace);
                $path = str_ireplace("\\", "/", $path);
                if (file_exists(__DIR_BASE__."\\{$path}.php")) {
                    $path = __DIR_BASE__."\\{$path}.php";
                    $path = strtolower($path);
                    require_once $path;
                }
            }
        );
    }
}
