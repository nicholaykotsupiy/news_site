<?php

namespace Sakura\App\Core;

use Sakura\App\Controller\AuthController;

class App
{
    public function run (): void
    {
        $request = new Request();
        // dump((new Config)->getConfig('db'));
        $route = $request->getRoute();
        $auth = (new AuthController())->index($route);
    }
}