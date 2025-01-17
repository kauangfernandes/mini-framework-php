<?php

namespace App\Controllers;

class indexController extends \App\Core\View
{
    public function __construct(
        private $connection = null
    ) {
        $this->connection = \App\Core\Connection::getInstancia();
        parent::__construct();
    }

    public function index()
    { 
        $welcome = "welcome to the framework.";

        $css = array(
            "styles",
            "home"
        );

        $js = array(
            ["file" => "index", "defer"=> true, "load" => false],
            ["file" => "index1", "defer"=> true],
            ["defer"=> false, "load" => true],
            'main'
        );

        $this->setTitle("Welcome");
        $this->setNameApp("Framework");
        $this->setTemplate("default");
        $this->setPage("index");
        /*
        $this->setArrayCss($css);
        $this->setArrayJs($js);
        */
        $this->setJs(fileName:"index2", defer: true, load: true);
        $this->setResponse(attr:'fistName', value:"Kauan");

        return $this->renderView(title:'', template:'', page: '', arrayCss:$css, arrayJs:$js, response:compact('welcome'));
    }
}
