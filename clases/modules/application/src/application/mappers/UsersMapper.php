<?php
namespace application\mappers;

use core\models as core;
use application\entities\UserEntity;
use application\entities\UsersCollection;

class UsersMapper
{
    public $config;
    public $adapter;
    
    public function __construct()
    {        
        $this->setConfig();
        $this->entity = new UserEntity();
        $this->collection = new UsersCollection();
    }
    
    public function login($filterdata)
    {
        $gatewayname = '\\application\gateways\Users'.$this->adapter;
        $gateway = new $gatewayname($this->config->application);
        $user = $gateway->getUserLogin($filterdata);
        
        $entity = new UserEntity();
        
        if(isset($user[0]))
            $entity->hydrate($user[0]);
        
        
        if($entity instanceof UserEntity)
            if(!empty($entity->iduser) && $entity->iduser!='')
                return TRUE;
        
        return FALSE;
        
        
    }
    
    
    public function getConfig()
    {
        
    }
    
    public function setConfig()
    {
        $fc = core\FrontController::getInstance();
        $this->config = $fc->getConfig();
        $this->adapter = $this->config->application->adapter;

        
    }
   
    
    public function getUsers()
    {
        $gatewayname = '\\application\gateways\Users'.$this->adapter;
        $gateway = new $gatewayname($this->config->application);
        $users = $gateway->getUsers();
           
        foreach ($users as $user)
        {
            $entity = new UserEntity();
            $entity->hydrate($user);
            $this->collection->$user['iduser']=$entity;
        }
        
//         echo "<pre>users: ";
//         print_r($users);
//         echo "</pre>";
        
//         echo "<pre>collection: ";
//         print_r($this->collection);
//         echo "</pre>";
        
        
        return $this->collection;
        
    }
    
    
}