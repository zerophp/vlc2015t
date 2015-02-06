<?php
namespace application\controllers;

class Index 
extends \core\controllers\Controller
implements \core\controllers\ControllerInterface
{
    public $layout = 'jumbotron';
    
//     public function __construct($dispatch)
//     {
//         $this->request = $dispatch->request;
//     }
    
    public function index()
    {
        return \core\models\Mvc::getView(__METHOD__);
    }    
}