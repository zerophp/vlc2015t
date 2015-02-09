<?php
namespace application\controllers;

use core\models\Mvc;
use application\services\UsersService;

class Author
extends \core\controllers\Controller
implements \core\controllers\ControllerInterface
{
    public $layout = 'login';
    
    public function index()
    {
        $content = Mvc::renderView($this->getRequest(), $this->getConfig());
        
        return $content;
    }
    
    public function logout()
    {
        unset($_SESSION['application']['login']);
        session_regenerate_id();
        header('Location: /');    
    }
    
    public function login()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        require_once ('../modules/application/src/application/forms/loginForm.php');
        require_once ('../modules/core/src/core/forms/filterForm.php');
        require_once ('../modules/core/src/core/forms/validationForm.php');
        
        if($_POST)
        {
            $filterdata = filterForm($loginForm, $_POST);
            $validationdata = validationForm($loginForm, $filterdata);
            if($validationdata===TRUE)
            {
                $userService = new UsersService();
                $log = $userService->login($filterdata);
                if($_SESSION['application']['login'])
                    header ("Location: /users/select");
            }
            
        }
        
        
    }
}