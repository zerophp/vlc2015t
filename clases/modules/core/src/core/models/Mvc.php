<?php
namespace core\models;

class Mvc
{
    public static function getView($method)
    {
        $method = explode("::", $method);
        $method[0] = lcfirst(substr($method[0], strrpos($method[0], "\\")+1)); 
        $filename = '../modules/application/src/application/views/'.$method[0].'/'.$method[1].'.phtml';

        ob_start();
            include($filename);
            $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
}