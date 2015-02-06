<?php
namespace core;


class Module
{
    public $config;
    
    public function __construct()
    {
        $this->setConfig();
    }
    
    
    public function getBootstrap()
    {
        //$config = $this->getConfig();         
    }
    
    public function getConfig()
    {
        return $this->config;
    }
    
    public function setConfig()
    { 
        $config=array();
        
            $config_local=array();
            $config_global=array();
            $localfile = '../configs/autoload/'.__NAMESPACE__.'.local.php';
            $globalfile = '../configs/autoload/'.__NAMESPACE__.'.global.php';
    
            if(file_exists($localfile))
                $config_local = require_once($localfile);
            
            if(file_exists($globalfile))
                $config_global = require_once($globalfile);
            
            $config = array_merge($config_global, $config_local);
        
            $option = new options\Options();
            foreach($config as $property => $value)
                $option->$property = $value;
            
        $this->config = $option;
        return $this->config;
    }
}
