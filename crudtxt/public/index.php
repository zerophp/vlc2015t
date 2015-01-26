<?php


require_once ('../modules/core/src/core/models/parseUrl.php');

$request = parseURL();
//$request = routeUrl($request);


switch($request['controller'])
{
    case 'usuarios':
        include_once('../modules/application/src/application/controllers/usuarios.php');
    break;
    case 'error':
    break;    
    case 'index':
    break;
}















