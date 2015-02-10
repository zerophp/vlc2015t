<?php
namespace application\models;

class Kaka2
{
    public $adapter;
    private $config;
    private $filename;
    
    public function __construct()
    {
        $fc = \core\models\FrontController::getInstance();
        $this->config = $fc->getConfig();
        $this->filename =  $this->config['filename'];
        $this->adapter = new $this->config['adapter']($this->config);
    }
    
    
    public function getUsers()
    {
        // Leer usuarios.txt en un string
        $users = file_get_contents($this->filename);
        
        // Separar cada linea en un array
        $users = explode("\n", $usuarios);
        
        return $users;
    }
}
/*
function getUsersDB($table, $config)
{
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    
    mysqli_select_db($link, $config['db']['database']);
    
    $query = "SELECT * FROM ".$table;
    //echo $query;
    
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_assoc($result))
        $usuarios2[]=$row;
    
    foreach ($usuarios2 as $values)
        $usuarios[] = implode("|", $values);
    
    return $usuarios;
}
*/
