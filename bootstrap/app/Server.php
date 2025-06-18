<?php

namespace Bootstrap\App;

use Soap\Url;

class Server
{
    // public function __construct(){}

    public function getServerAll()
    {
        return $_SERVER;
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPathInfo()
    {
        return $_SERVER['PATH_INFO'];
    }

    public static function getUri()
    {
        //$uri = $_SERVER['REQUEST_URI'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode("/" . __DIR_PUBLIC_NAME__ . "/", $uri);
        $uri = count($uri) > 1 ? $uri[1] : $uri[0];
        $uri = !str_starts_with($uri, "/") ? "/" . $uri : $uri;

        if(str_contains($uri, "?")){
            $uri = explode("?", $uri);
            $uri = $uri[0];
        }
        return $uri;
    }
}
