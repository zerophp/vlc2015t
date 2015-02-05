<?php
namespace core\controllers;

abstract class Controller
{
    private $request;
    private $config;
    
    /**
     * @param field_type $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
    
    /**
     * @param field_type $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }
	/**
     * @return the $request
     */
    public function getRequest()
    {
        return $this->request;
    }

	/**
     * @return the $config
     */
//     abstract public function getConfig();
    public function getConfig()
    {
        return $this->config;
    }

    
    
}