<?php


require_once ('../modules/core/src/core/models/parseUrl.php');

$request = parseURL();

// /usuarios/index/param1/val1/param2/val2

$request=array('controller'=>'usuarios',
               'action'=>'index',
               'params'=>array('param1'=>'val1',
                               'param2'=>'val2')
);
// 


if(isset($_GET['controller']))
    $controller = $_GET['controller'];
else
    $controller = 'usuarios';

switch($controller)
{
    case 'usuarios':
        include_once('../modules/application/src/application/controllers/usuarios.php');
    break;    
}















