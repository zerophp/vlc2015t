<?php
namespace application\services;

use application\services\UsersService;
use core\models\FrontController;

class UsersServicesApi
{
    public function GET()
    {
        $fc = FrontController::getInstance();
        if(isset($fc->request['params']))
        {
            $usersService = new UsersService();
            $usuario = $usersService->getUser($fc->request['params']);
            if($usuario->iduser)
                return json_encode($usuario);
        }
        else
        {
            $usersService = new UsersService();
            $usuarios = $usersService->getUsers();
            return json_encode($usuarios);
        }
    }
    
    public function POST($data)
    {
        die("Method not implemented");
    }
    
    public function PUT($id, $data)
    {
        die("Method not implemented");
    }
    
    public function DELETE($id)
    {
        die("Method not implemented");
    }
    
    public function OPTIONS()
    {
        die("Method not implemented");
    }
    
    
}