<?php
    require_once "route.class.php";
    //Initial Route.
    App\Routes\Route::getHttp("/", [\App\Controllers\indexController::class, "index"]);


    App\Routes\Route::startInstancia();
?>