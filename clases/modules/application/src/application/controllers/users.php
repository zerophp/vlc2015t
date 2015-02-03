<?phP

require_once ('../modules/application/src/application/forms/userForm.php');
require_once ('../modules/core/src/core/forms/filterForm.php');
require_once ('../modules/core/src/core/forms/validationForm.php');
require_once ('../modules/application/src/application/models/insertUser.php');
require_once ('../modules/application/src/application/models/insertUserDB.php');
require_once ('../modules/application/src/application/models/updateUser.php');
require_once ('../modules/application/src/application/models/updateUserDB.php');
require_once ('../modules/application/src/application/models/getUsers.php');
require_once ('../modules/application/src/application/models/getUsersDB.php');
require_once ('../modules/application/src/application/models/getUserDB.php');
require_once ('../modules/application/src/application/models/getUser.php');
require_once ('../modules/application/src/application/models/deleteUser.php');
require_once ('../modules/application/src/application/models/deleteUserDB.php');


require_once ('../modules/core/src/core/models/renderView.php');


$filename= $config['filename'];

if ($request['action']=='index')
    $request['action']='select';


switch($request['action'])
{
    case 'insert':        
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
    break;
        
    case 'update':
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
    break;
    default:
    case 'select':
        // $usuarios = getUsers($filename);
        $usuarios=getUsersDB('users', $config);
        $content = renderView($request, $config, 
                              array('usuarios'=>$usuarios));        
    break;
    
    case 'delete':

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
        
    break;
}




include('../modules/application/src/application/layouts/dashboard.phtml');




















