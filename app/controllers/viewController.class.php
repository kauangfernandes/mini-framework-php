<?php

    class viewController{
        public function __construct(
            protected string $title = "",
            protected string $template = "default",
            protected string $page = "not_found",
            protected array $css = array(),
            protected array $js = array(),
            protected $results = null,
            protected $object = null
        ){
            $this->object = new \stdClass();
        }

        public function getTitle(): string{
            return $this->title;
        }

        public function setTitle(string $title){
            $this->title = $title;
        }

        public function getTemplate(): string{
            return $this->template;
        }

        public function setTemplate(string $template){
            $this->template = $template;
        }

        public function getPage(): string{
            return $this->page;
        }

        public function setPage(string $page){
            $this->page = $page;
        }

        public function getCss(): array{
            return $this->css;
        }

        public function setCss(array $css){
            $this->css[] = $css;
        }

        public function getJs(){
            return $this->js;
        }

        public function setJs(array $js){
            $this->js[] = $js;
        }

        public function getResults(){
            return $this->results;
        }

        public function setResults($results){
            $this->results = $results;
        }

        public function getObject(){
            return $this->object;
        }

        public function setObject($object){
            $this->object = $object;
        }

        public function render(){
            if(isset($this->page) AND $this->page != "not_found"){

                $css = $this->css;
                $js = $this->js;
                $object = $this->object;
                $results = $this->results;
                $page = $this->page;
                $title = $this->title;

            } else {
                $page = "not_found";
                $title = "Erro 404";
            }

            require_once "../app/views/template/{$this->template}.php";
        }
    }

?>