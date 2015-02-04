<?php
namespace core\models;

class Mvc

{
    public static function getView()
    {
        ob_start();
            include('../modules/application/src/application/views/index/index.phtml');
            $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
}