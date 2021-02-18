<?php

namespace Sakura\App\Core;

class Request
{
    private $route;

    public function getRoute ()
    {
        return substr($_SERVER['REQUEST_URI'], 1);
    }
}