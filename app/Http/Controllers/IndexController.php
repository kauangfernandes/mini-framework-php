<?php

    namespace App\Http\Controllers;
    use Bootstrap\App\Request;

    class indexController
    {
        public function __construct() {}

        public function index(Request $request)
        { 
            return printf("Hello World");
        }
    }

?>