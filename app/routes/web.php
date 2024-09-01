<?php
    //Initial Route.
    Route::getHttp("/", [indexController::class, "index"]);
    Route::getHttp("/erro", [indexController::class, "erro"]);


    Route::startInstancia();
?>