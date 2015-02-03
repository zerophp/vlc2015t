<?php




function __autoload($className)
{
    $data = explode('\\', $className);
    
    $file = implode("/", $data);
    
    $dirmodules = __DIR__."\\modules\\";
    $dirvendor = __DIR__."\\vendor\\";
    
    $filename= $data[0]."\\src\\".$file.'.php';
    
    if(file_exists($dirmodules.$filename))
        require_once ($dirmodules.$filename);
    else 
        require_once ($dirvendor.$filename);
    
}









