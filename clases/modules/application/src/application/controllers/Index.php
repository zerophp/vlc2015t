<?php
namespace application\controllers;

class Index
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