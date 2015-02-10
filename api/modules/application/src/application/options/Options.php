<?php
namespace application\options;

class Options
{
    public $filename = '\core\adapters\MysqlAdapter';
    public $viewPath = '../modules/application/src/application/views';
    public $db=array('host'=>'localhost',
                     'user'=>'root',
                     'password'=>'1234',
                     'database'=>'crud'
                    );
    public $adapter='\core\adapters\MysqlAdapter';
    
   
}