<?php
namespace application\services;

use application\mappers as mapper;

class UsersService
{
    public function getUsers()
    {
        $mapper = new mapper\UsersMapper();
        $mapper -> getUsers();
        /* Muchas cosas mas*/
        return $mapper -> getUsers();
    }
    
    public function insertUser($data)
    {
        
    }
    
    public function loginTwitter($filterdata)
    {
            
    }
    
    
    public function login($filterdata)
    {
        $mapper = new mapper\UsersMapper();
        $mapper->login($filterdata);
        if($mapper->login($filterdata))
        {
            $_SESSION['application']['login']=TRUE;
            session_regenerate_id();
        }
        
        return;
        
    }
}