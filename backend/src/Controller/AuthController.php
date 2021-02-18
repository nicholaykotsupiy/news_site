<?php

namespace Sakura\App\Controller;

use Sakura\App\Core\View;
use Sakura\App\Model\User;

class AuthController
{
    public function index ($route = 'auth')
    {
        $user = new User;
        $usersArr = $user->index();

        if(isset($_POST['login']) && isset($_POST['password'])){

            $login = $_POST['login'];
            $password = $_POST['password'];

            $auth = $user->searchUser($login, $password);

            if($auth) {
                $route = 'main';
            }
        }
        if($route === ''){
            View::render('auth');
        }else {
            View::render($route);
        }
    }
}