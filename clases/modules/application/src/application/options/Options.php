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
    
	/**
     * @return the $filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

	/**
     * @return the $viewPath
     */
    public function getViewPath()
    {
        return $this->viewPath;
    }

	/**
     * @return the $db
     */
    public function getDb()
    {
        return $this->db;
    }

	/**
     * @return the $adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

	/**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

	/**
     * @param string $viewPath
     */
    public function setViewPath($viewPath)
    {
        $this->viewPath = $viewPath;
    }

	/**
     * @param multitype:string  $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

	/**
     * @param string $adapter
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

        
       
    
   
}