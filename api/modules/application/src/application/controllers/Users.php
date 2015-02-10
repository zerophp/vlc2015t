<?phP
namespace application\controllers;


use application\services\UsersService;
use core\models\Mvc;
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
extends \core\controllers\Controller
implements \core\controllers\ControllerInterface
{        
    public $layout = 'dashboard';
        
    public function __construct()
    {
        if(!$_SESSION['application']['login'])
            header("Location: /author/index");
    }
    
    
    public function index()
    {
        header ("Location: /users/select");
    }
    
    public function select()
    { 
        
        $usersService = new UsersService();
        $usuarios = $usersService->getUsers();

        $content = Mvc::renderView($this->getRequest(), $this->getConfig(),
            array('usuarios'=>$usuarios));
    
        return $content;
    }
    
    public function select2()
    {

        require_once ('../modules/application/src/application/models/getUsersDB.php');
        $usuarios=getUsersDB('users', $this->getConfig());
        require_once ('../modules/core/src/core/models/renderView.php');
        $content = renderView($this->getRequest(), $this->getConfig(),
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
























