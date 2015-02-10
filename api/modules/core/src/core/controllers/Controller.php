<?php
namespace core\controllers;

abstract class Controller
{
    private $request;
    private $config;
    private $method;
    
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
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
    
//     abstract private function get()
//     {
//         // Lllamar con get a //resource;
//     }
//     abstract private function post();
//     abstract private function put();
//     abstract private function delete();
//     abstract private function options();

    
    
}