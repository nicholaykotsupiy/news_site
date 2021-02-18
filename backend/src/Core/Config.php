<?php

namespace Sakura\App\Core;

class Config
{
    private $config;

    public function __construct()
    {
        $this->config = parse_ini_file(str_replace('src/Core', '', __DIR__) . 'config/config.ini');
    }

    public function getConfig ($name = 'db'): array
    {
        return $this->config[$name];
    }
}