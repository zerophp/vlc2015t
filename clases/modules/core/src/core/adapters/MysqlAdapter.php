<?php
namespace core\adapters;

use \acl\adapters\AdapterInterface;

class MysqlAdapter implements \acl\adapters\AdapterInterface
{
    private $config;
    private $link;
    
    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
        $this->selectDb();
    }    
    
    private function connect()
    {        
    $this->link = mysqli_connect($this->config['host'], 
                                     $this->config['user'], 
                                     $this->config['password']
                                    );            
    }
    
    private function close()
    {
        mysqli_close($this->link);    
    }
    
    private function selectDb()
    {
        mysqli_select_db($this->link, $this->config['database']);    
    }
    
    public function updateQueryDb($query)
    {
        return mysqli_query($this->link, $query);    
    }
    
    public function selectQueryDb($query)
    {
        $array = array();        
        $result  = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $array[]=$row;
        }
        return $array;    
    }
    
    public function __destruct()
    {
        $this->close();    
    }
      
}
