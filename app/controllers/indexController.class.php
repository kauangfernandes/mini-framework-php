<?php

    class indexController extends viewController{
        public function __construct(
            private $connection = null
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function index(){
            $this->__set("title", "Hello word");
            $this->__set("page", "index");
            $this->render();
        }
    }

?>