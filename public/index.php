<?php
    define("__DIR_BASE__", dirname(__DIR__));
    define("__DIR_APP__", __DIR_BASE__ . "\\app\\");
    define("__DIR_BOOTSTRAP__", __DIR_BASE__ . "\\bootstrap\\");
    define("__DIR_PUBLIC__", __DIR_BASE__ . "\\public\\");
    define("__DIR_PUBLIC_NAME__", basename(__DIR__));

    require_once __DIR_BOOTSTRAP__."config.php";
    require_once __DIR_BOOTSTRAP__."app.php";

    Bootstrap\App::run();
?>