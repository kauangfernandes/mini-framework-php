<?php
    namespace App\Controllers;

    class indexController extends \App\Controllers\viewController{
        public function __construct(
            private $connection = null
        ){
            $this->connection = \App\Core\Connection::getInstancia();
            parent::__construct();
        }
        
        public function index(){
            $this->__set("title", "Hello world");
            $this->__set("page", "index");
            $this->render();
        }
    }
?>