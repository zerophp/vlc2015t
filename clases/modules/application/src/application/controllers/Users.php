<?phP
namespace application\controllers;


// require_once ('../modules/application/src/application/forms/userForm.php');
// require_once ('../modules/core/src/core/forms/filterForm.php');
// require_once ('../modules/core/src/core/forms/validationForm.php');
// require_once ('../modules/application/src/application/models/insertUser.php');
// require_once ('../modules/application/src/application/models/insertUserDB.php');
// require_once ('../modules/application/src/application/models/updateUser.php');
// require_once ('../modules/application/src/application/models/updateUserDB.php');
// require_once ('../modules/application/src/application/models/getUsers.php');
// require_once ('../modules/application/src/application/models/getUsersDB.php');
// require_once ('../modules/application/src/application/models/getUserDB.php');
// require_once ('../modules/application/src/application/models/getUser.php');
// require_once ('../modules/application/src/application/models/deleteUser.php');
// require_once ('../modules/application/src/application/models/deleteUserDB.php');


// require_once ('../modules/core/src/core/models/renderView.php');


class Users
{
    
    public $layout = 'dashboard';
    public $request;
    public $config;
    
    public function __construct($dispatch, $config)
    {
        $this->request = $dispatch->request;
        $this->config = $config;
    }
    
//     public function __construct($request, $config)
//     {
//         $this->request = $request;
//         $this->config = $config;
        
        
//     }
    
    public function index()
    {
        die("kaka");
       header('Location: /users/select'); 
    }
    
    public function select()
    {
       
        require_once ('../modules/application/src/application/models/getUsersDB.php');
        $usuarios=getUsersDB('users', $this->config);
        require_once ('../modules/core/src/core/models/renderView.php');
        $content = renderView($this->request, $this->config,
            array('usuarios'=>$usuarios));
        
        return $content;
    }
    
    public function insert()
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            $validationdata = validationForm($userForm, $filterdata);
            if($validationdata===TRUE)
            {
                //insertUser($filterdata, $filename);
                insertUserDB($filterdata, 'users', $config);
            }
            header('Location: /users');
        }
        else
        {
            $content = renderView($request, $config);
        }
        
        return $content;
    }
    
    public function update()
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            // Validar el formulario
            //updateUser($filterdata, $filterdata['id'], $filename);
            updateUserDB($filterdata, 'users', $config, $filterdata['iduser']);
            header('Location: /users');
        }
        else
        {
            // $usuario = getUser($request['params']['id'], $filename);
            $usuario = getUserDB('users', $request['params']['id'], $config);
            $content = renderView($request, $config, array('usuario'=>$usuario[0]));
        }
        
        return $content;
    }
    
    public function delete()
    {
        if($_POST)
        {
            if($_POST['submit']=='si')
            {
                //deleteUser($filename,$_POST['id']);
                deleteUserDB('users', $_POST['iduser'], $config);
            }
            // Saltar a select
            header('Location: /users');
        }
        else
        {
            $content =renderView($request, $config);
        }
        
        return $content;
    }
}
























