<?php
namespace application\services;

use application\mappers as mapper;

class UserService
{
    public function getUsers()
    {
        $mapper = new mapper\UsersMapper();
        $mapper -> getUsers();
        /* Muchas cosas mas*/
        return $mapper -> getUsers();
    }
}