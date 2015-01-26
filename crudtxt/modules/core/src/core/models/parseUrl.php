<?php

function parseUrl()
{
    $request = array();
    // Dividir el string por /
    $request = explode("/", $_SERVER['REQUEST_URI']);
    
    // Mientras que ultimo elemento vacio, eliminarlo
    // Si longitud superior a 3 y par error 412
    // De lo contrario hacer array de params
    
    // If file_exist controller && controller not ''
        // OK 
            // If action in array && not ''
                // Ok 
                    // Return request
                // KO
                    // Return error 404
            // else action ''
                // action = index
                
                    
        // KO
            // Return erro 404
   
    // else controller ''
        // Return controller = index, action =index
    
    
    echo $_SERVER['REQUEST_URI'];
    
    echo "<pre>";
    print_r($request);
    echo "</pre>";
    
    die;
    $actions = array('usuarios'=>array('select','insert','delete', 'update'));
    
    return $request;
}