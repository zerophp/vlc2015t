<?php
namespace application\gateways;

use core\adapters\MysqlAdapter;
class UsersMysql extends MysqlAdapter
{
    public $adapter;
    private $config;
    
//     public function __construct()
//     {
//         $fc = \core\models\FrontController::getInstance();
//         $this->config = $fc->getConfig();        
//     }
    
    public function getUserLogin($filterdata)
    {
        $sql = "SELECT * FROM users WHERE email ='".$filterdata['email']."' 
                        AND password='".$filterdata['password']."'";
        
        $users = $this->fetch($sql);
        return $users;
    }
    
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $users = $this->fetch($sql);
        return $users;
    }
    
    public function getUser($id)
    {
        
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

