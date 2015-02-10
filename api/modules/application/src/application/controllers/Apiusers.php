<?php
namespace application\controllers;



use application\services\UsersServicesApi;

class Apiusers
extends \core\controllers\Controller
implements \core\controllers\ControllerInterface
{
    public $layout = NULL;
    
    public function index()
    {        
        header("Content-Type: application/json");
        $service = new UsersServicesApi();
        echo $service->{$_SERVER['REQUEST_METHOD']}();
        
    }
}