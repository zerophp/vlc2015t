<?php


echo $_SERVER['REQUEST_URI'];

$request = parseURL();
$request=array('controller'=>,
               'action'=>,
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