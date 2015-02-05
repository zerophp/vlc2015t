<?php

function renderView($request, $config, $data=null)
{
    $request['controller'] = lcfirst(substr($request['controller'], 
                                strrpos($request['controller'], "\\")+1)); 
    ob_start();
        include ($config['view_path']."/".
                 $request['controller']."/".
                 $request['action'].".phtml");
        
        $content = ob_get_contents();
    ob_end_clean();
    
    return $content;
}