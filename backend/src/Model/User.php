<?php

namespace Sakura\App\Model;

use Sakura\App\Core\DbConnect;

class User
{
    public function index ()
    {
        $dbh = (new DbConnect())->getHandle();
        $sth = $dbh->query('select * from users');
        $result = $sth->fetchAll();
        
        return $result;
    }

    public function searchUser ($login = '', $password = '')
    {
        if($login !== '' && $password !== '')
        {
            $users = $this->index();
            foreach($users as $user)
            {
                if($login !== $user['login']){
                    echo 'Логин не верный';
                }else if(!password_verify($password, $user['password'])){
                    echo 'Пароль не верный';
                }else {
                    return true;
                }
            }
        }else {
            echo 'Введите данные';
        }
    }

    public function addUser ()
    {
        
    }
}