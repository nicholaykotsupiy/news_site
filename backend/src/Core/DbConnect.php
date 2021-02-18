<?php

namespace Sakura\App\Core;

use PDO;

class DbConnect
{
    private $handle;
    private $config;

    public function __construct()
    {
        $this->config = (new Config())->getConfig();
        $host = $this->config['host'];
        $dbname = $this->config['dbname'];
        $charset = $this->config['charset'];
        $user = $this->config['user'];
        $password = $this->config['password'];
        
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->handle = new PDO($dsn, $user, $password, $opt);
    }
    
    public function getHandle()
    {
        return $this->handle;
    }
}