<?php

function parseUrl()
{
    $actions = array('users'=>array('select','insert','delete', 'update'),
                     
    );

    $request = array();
    // Dividir el string por /
    $request = explode("/", $_SERVER['REQUEST_URI']);

    
    if($request[1]=='')
        return array('controller'=>'index',
            'action'=>'index'
        );
        
    // Mientras que ultimo elemento vacio, eliminarlo
    while($request[count($request)-1]=='')
        unset($request[count($request)-1]);
    
    // Si longitud superior a 3 y par error 412
    if(count($request) > 3 && (count($request)%2) == 0 )
        return array('controller'=>'error',
                     'action'=>'412'
                    );
        
    // De lo contrario hacer array de params
    $params = array();
    for($a=3;$a<count($request);$a+=2)
    {
        $params[$request[$a]]=$request[$a+1];
    } 
    
        
    // If file_exist controller && controller not ''
    if(file_exists($_SERVER['DOCUMENT_ROOT'].
                   '/../modules/application/src/application/controllers/'.
                   $request[1].'.php') &&
        $request[1]!='')
    {
        // If action in array && not ''
        // Ok
        // Return request
        $controller = $request[1];
        if(!isset($request[2]))
            return array('controller'=>$controller,
                         'action'=> 'index'
            );
            
        if(in_array($request[2], $actions[$request[1]]) && $request[2]!='')
        {
            $action = $request[2]; 
            return array('controller'=>$controller,
                         'action'=> $action,
                         'params'=>$params
            );        
        }
        else if($request[2]=='')
        {
            return array('controller'=>$controller,
                'action'=> 'index',
                'params'=>$params
            );
        }
        else 
        {
            return array('controller'=>'error',
                         'action'=> '404'
            );
        }
        

    }
    else
    {
        return array('controller'=>'error',
            'action'=> '404'
        );
    }
     
}