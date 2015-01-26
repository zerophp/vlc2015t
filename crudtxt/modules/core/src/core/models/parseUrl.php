<?php

function parseUrl()
{
    $request = array();
    // Dividir el string por /
    $request = explode("/", $_SERVER['REQUEST_URI']);
    
    // Mientras que ultimo elemento vacio, eliminarlo
    // Si longitud superior a 3 y par error 412
    
    
    
    echo $_SERVER['REQUEST_URI'];
    
    echo "<pre>";
    print_r($request);
    echo "</pre>";
    
    die;
    $actions = array('usuarios'=>array('select','insert','delete', 'update'));
    
    return $request;
}