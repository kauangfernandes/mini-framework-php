<?php
    use Bootstrap\Router\Route;

    Route::get("/", [\App\Http\Controllers\IndexController::class, "index"]);
    Route::get("/hello/world", function () {
        return printf("Hello/World!");
    });
?>