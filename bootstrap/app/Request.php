<?php
    namespace Bootstrap\App;

    class Request {
        public function __construct(
            private $request = null
        ){
            $this->request = $_REQUEST;
        }

        public function getRequest(){
            return $_REQUEST;
        }

        public function validation(array $rules, array $parameters){

        }
    }
?>