<?php

    class indexController extends viewController{
        public function __construct(
            private $connection = null
        ){
            $this->connection = Connection::getInstancia();
            parent::__construct();
        }
        
        public function index(){
            $this->setTitle(title:"Hello word");
            $this->setPage(page:"index");
            $this->render();
        }
    }

?>