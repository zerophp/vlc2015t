<?php
namespace application\mappers;

use core\models as core;

class UsersMapper
{
    public $config;
    public $adapter;
    
    public function __construct()
    {        
        $this->setConfig();
    }
    
    public function getConfig()
    {
        
    }
    
    public function setConfig()
    {
        $fc = core\FrontController::getInstance();
        $this->config = $fc->getConfig;
        echo "<pre>";
        print_r($this->config)
        echo "</pre>";
        
        $this->adapter = $this->config['adapter'];
        
    }
   
    
    public function getUsers()
    {
        $adapter
        $gateway
        
    }
    
    
}