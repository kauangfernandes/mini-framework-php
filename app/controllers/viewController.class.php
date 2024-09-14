<?php
    namespace App\Controllers;
    
    abstract class viewController{
        protected function __construct(
            protected string $title = "",
            protected string $nameApp = "Framework",
            protected string $template = "default",
            protected string $page = "not_found",
            protected array $css = array("styles"),
            protected array $js = array("index"),
            protected $response = null
        ){
            $this->response = new \stdClass();
        }

        protected function render(){
            if(isset($this->page) AND $this->page != "not_found"){

                $title = $this->title;
                $nameApp = $this->nameApp;
                $page = $this->page;
                $css = $this->css;
                $js = $this->js;
                $response = $this->response;
                
            } else {
                $page = "not_found";
                $title = "Erro 404";
            }

            require_once "../app/views/template/{$this->template}.php";
        }

        public function __get(String $attr){
            return $this->$attr;
        }

        public function __set(String $attr, $value){
            if(is_array($this->$attr)){
                $this->$attr[] = $value;
            } else {
                $this->$attr = $value;
            }
        }

        public function setResponse(String $attr, Mixed $value){
            $this->response->$attr = $value;
        }
        
    }

?>