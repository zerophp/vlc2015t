<?php
namespace core\models;

class Dispatch
{
    public $request;
    
    public function __construct($request)
    {
        $this->request = $request;
    }
    
    public function run()
    {
        $controller = $this->request['controller'];
        $action = $this->request['action'];
        
        $controller = new $controller();
        $controller->$action();        
    }    
}