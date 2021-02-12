<?php

namespace It20Academy\App\Core;

class Request
{
    private $controller = 'IndexController';

    private $method = 'index';
    
    private $controllerPath = 'It20Academy\App\Controllers\\EmptyController';

    

    public function __construct()
    {

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, []);

        // controller
        if (isset($uri[1])) {
            $this->controller = ucfirst($uri[1]); // Posts
            $this->$controllerPath = 'It20Academy\App\Controllers\\' . $this->controller . 'Controller'; //Path
        }

        // method
        if (isset($uri[2])) {
            $this->method = $uri[2];
        }
    }

    public function validateCommand(): bool
    {
        // controller
        if (! class_exists($this->$controllerPath)) {
            dump("{$this->$controllerPath} does not exists!");

            return false;
        }

        // method
        if (! method_exists($this->$controllerPath, $this->method)) {
            dump("Method {$this->method} does not exists!");

            return false;
        }

        return true;
    }

    public function getController(): string
    {
        return $this->$controllerPath;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}