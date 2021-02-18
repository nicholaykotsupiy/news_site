<?php

namespace Sakura\App\Core;

class View
{
    public static function render ($view)
    {  
        $tplPath = str_replace('Core', '', __DIR__) . "/view/{$view}.tpl.php";

        if(file_exists($tplPath))
        {
            include($tplPath);
        }
        
    }
}