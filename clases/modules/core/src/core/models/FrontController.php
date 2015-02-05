<?php
namespace core\models;

class FrontController
{
    private $config;
    public $request;
    public $response;    
    private $layout;
    static $instance;
    private $applicationConfig;
    
    public static function getInstance($applicationConfig)
    {
        if(!self::$instance)
            self::$instance = new FrontController($applicationConfig);
        
        return self::$instance; 
            
    } 
    
    private function __construct($applicationConfig)
    {
        $this->applicationConfig = require_once('../'.$applicationConfig);
        $this->config = $this->getConfig();
        $this->request = $this->parseUrl();       
    }
    
    public function getconfig()
    {   
        $config2=array();        
        
        foreach ($this->applicationConfig['modules'] as $modules)
        {
            $config_local=array();
            $config_global=array();
            if(file_exists('../configs/autoload/'.$modules.'.local.php'))
            {
                require_once('../configs/autoload/'.$modules.'.local.php');
                $config_local = $config;
            }
            
            if(file_exists('../configs/autoload/'.$modules.'.global.php'))
            {
                include_once('../configs/autoload/'.$modules.'.global.php');
                $config_global = $config;
            }
            
            $config2 = array_merge($config2, $config_global, $config_local);
        }
        
        return $config;
    }
    
    public function parseUrl()
    {
        
    
        $request = array();
        // Dividir el string por /
        $request = explode("/", $_SERVER['REQUEST_URI']);
    
    
        if($request[1]=='')
            return array('controller'=>'application\\controllers\\index',
                'action'=>'index'
            );
    
            // Mientras que ultimo elemento vacio, eliminarlo
            while($request[count($request)-1]=='')
                unset($request[count($request)-1]);
    
            // Si longitud superior a 3 y par error 412
            if(count($request) > 3 && (count($request)%2) == 0 )
                return array('controller'=>'application\\controllers\\error',
                    'action'=>'error412'
                );
    
                // De lo contrario hacer array de params
                $params = array();
                for($a=3;$a<count($request);$a+=2)
                {
                    $params[$request[$a]]=$request[$a+1];
                }
    
    
                // If file_exist controller && controller not ''
                if(file_exists($_SERVER['DOCUMENT_ROOT'].
                    '/../modules/application/src/application/controllers/'.
                    $request[1].'.php') &&
                    $request[1]!='')
                {
                    // If action in array && not ''
                    // Ok
                    // Return request
                    $controller = $request[1];
                    if(!isset($request[2]))
                        return array('controller'=>'application\\controllers\\'.$controller,
                            'action'=> 'index'
                        );
    
                        if(method_exists('application\\controllers\\'.$request[1], $request[2]))
                        {
                            $action = $request[2];
                            return array('controller'=>'application\\controllers\\'.$controller,
                                'action'=> $action,
                                'params'=>$params
                            );
                        }
                        else if($request[2]=='')
                        {
                            return array('controller'=>'application\\controllers\\'.$controller,
                                'action'=> 'index',
                                'params'=>$params
                            );
                        }
                        else
                        {
                            return array('controller'=>'application\\controllers\\error',
                                'action'=> 'error404'
                            );
                        }
    
    
                }
                else
                {
                    return array('controller'=>'application\\controllers\\error',
                        'action'=> 'error404'
                    );
                }
                 
    }
    
    public function dispatch()
    {
        $controller = $this->request['controller'];
        $action = $this->request['action'];
        
        $controller = new $controller($this, $this->config);
        $this->layout = $controller->layout;
        
        $this->response = $controller->$action();
        $this->renderLayout();
        
        return $this;
        
    }
    
    public function renderLayout()
    {
        $content = $this->response;
        include('../modules/application/src/application/layouts/'.$this->layout.'.phtml');
        return ;
    }
}
