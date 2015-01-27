<?php

switch($request['action'])
{
    case 'index':
        ob_start();        
            include('../modules/application/src/application/views/index/index.phtml');
            $content = ob_get_contents();
        ob_end_clean();
    break;   
}


include('../modules/application/src/application/layouts/jumbotron.phtml');























