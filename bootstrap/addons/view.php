<?php

namespace App\Core;

abstract class view
{
    protected function __construct(
        protected string $title = "Welcome",
        protected string $nameApp = "Framework",
        protected string $template = "default",
        protected string $page = "not_found",
        protected array $arrayCss = array("styles"),
        protected array $arrayJs = array(["file" => "index", "defer" => false, "load" => true]),
        protected array $response = array()
    ) {

    }

    /**
     * Get the value of title
    */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
    */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of nameApp
    */
    public function getNameApp(): string
    {
        return $this->nameApp;
    }

    /**
     * Set the value of nameApp
    */
    public function setNameApp(string $nameApp): self
    {
        $this->nameApp = $nameApp;
        return $this;
    }

    /**
     * Get the value of template
    */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * Set the value of template
    */
    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Get the value of page
    */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * Set the value of page
    */
    public function setPage(string $page): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Get the value of arrayCss
    */
    public function getArrayCss(): array
    {
        return $this->arrayCss;
    }

    /**
     * Set the value of arrayCss
    */
    public function setArrayCss(array $arrayCss): self
    {
        $this->arrayCss = $arrayCss;
        return $this;
    }

    /**
     * Get the value of arrayJs
    */
    public function getArrayJs(): array
    {
        return $this->arrayJs;
    }

    /**
     * Set the value of arrayJs
    */
    public function setArrayJs(array $arrayJs): self
    {        
        $this->arrayJs = array_merge($this->arrayJs, $arrayJs);
        return $this;
    }

    /**
     * Get the value of response
    */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * Set the value of response
    */
    public function setResponse(String $attr, Mixed $value)
    {
        $this->response[$attr] = $value;
    }

    /** 
     * Get the value of JS
     */
    public function getJs(String $fileName): mixed
    {
        $msgErro = array("erro"=> true, "message"=> "The {$fileName}.js file is not declared in the array.");
        $erro = false;

        foreach ($this->arrayJs as $key => $value){

            if(!is_array($value)){

                if($value == $fileName){
                    return "The file {$value}.js to be loaded, but not an array, will be applied to the default settings.";
                } else {
                    $erro = true;
                }

            }

            if(is_array($value)){

                if(array_key_exists('file', $value)){

                    if($value['file'] == $fileName){
                        return $this->arrayJs[$key];
                    } else {
                        $erro = true;
                    }

                }
            }
        }

        return $msgErro;
    }

    /** 
     * Set the value of JS
    */
    public function setJs(String $fileName, Bool $defer = false, Bool $load = true): self
    {
        $this->arrayJs[] = ["file" => $fileName, "defer" => $defer, "load" => $load];
        return $this;
    }


    protected function renderView(string $title = null, string $nameApp = null, string $template = null, string $page = null, array $arrayCss = null, array $arrayJs = null, array $response = null)
    {
        if ($title != null and $title != "" and strlen($title) > 0) {
            $this->title = $title;
        }

        if ($nameApp != null and $nameApp != "" and strlen($nameApp) > 0) {
            $this->nameApp = $nameApp;
        }

        if ($template != null and $template != "" and strlen($template) > 0) {
            $this->template = $template;
        }

        if ($page != null and $page != "" and strlen($page) > 0) {
            $this->page = $page;
        }

        if (is_array($arrayCss) and count($arrayCss) > 0) {
            $this->arrayCss = $arrayCss;
        }

        if (is_array($arrayJs) and count($arrayJs) > 0) {
            $this->arrayJs = array_merge($this->arrayJs, $arrayJs);
            $this->organizeArrayJs();
        }

        if (is_array($response) and count($response) > 0) {
            $this->response = array_merge($this->response, $response);
        }

        if (isset($this->page) and $this->page != "not_found") {
            $title = $this->title;
            $nameApp = $this->nameApp;
            $page = $this->page;
            $arrayCss = $this->arrayCss;
            $arrayJs = $this->arrayJs;
            extract($response);
        } else {
            $page = "not_found";
            $title = "Erro 404";
        }
        
        return require_once "../app/views/template/{$this->template}.php";
    }

    public function redirect(String $route, array $parametros = null){
        header("location: {$route}");
        die();
    }

    private function organizeArrayJs(){
        
        foreach ($this->arrayJs as $key => $value) {

            if(!is_array($value)){
                $this->arrayJs[$key] = ["file" => $value, "defer" => false, "load" => true];
            }

            if(is_array($value)){

                if(!array_key_exists('file', $value)){
                    unset($this->arrayJs[$key]);
                }

                if(!array_key_exists('load', $value)){
                    $this->arrayJs[$key]['load'] = true;
                }

            }
        }
        
        foreach ($this->arrayJs as $keyX => $valueX) {
            foreach ($this->arrayJs as $key => $value) {
                if($valueX['file'] === $value['file'] AND $keyX != $key){
                    $this->arrayJs[$keyX] = $value;
                    unset($this->arrayJs[$key]);
                }
            }
        }

        foreach ($this->arrayJs as $key => $value) {
            if(array_key_exists('load', $value)){
                if(!$value['load']){
                    unset($this->arrayJs[$key]);
                }
            }
        }

        $tempArrayJs = $this->arrayJs;
        $this->arrayJs = array();

        foreach ($tempArrayJs as $key => $value) {
            $this->arrayJs[] = $value;
        }

        unset($tempArrayJs);
    }
}
