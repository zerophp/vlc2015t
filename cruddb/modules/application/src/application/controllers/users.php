<?phP

require_once ('../modules/application/src/application/forms/userForm.php');
require_once ('../modules/core/src/core/forms/filterForm.php');
require_once ('../modules/core/src/core/forms/validationForm.php');
require_once ('../modules/application/src/application/models/insertUser.php');
require_once ('../modules/application/src/application/models/updateUser.php');
require_once ('../modules/application/src/application/models/getUsers.php');
require_once ('../modules/application/src/application/models/getUser.php');
require_once ('../modules/application/src/application/models/deleteUser.php');

require_once ('../modules/core/src/core/models/getConfig.php');
require_once ('../modules/core/src/core/models/renderView.php');

$config = getConfig();
$filename= $config['filename'];


switch($request['action'])
{
    case 'insert':        
        if($_POST)
        {            
            $filterdata = filterForm($userForm, $_POST);
            $validationdata = validationForm($userForm, $filterdata);
            if($validationdata===TRUE)
            {
                insertUser($filterdata, $filename);
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
            updateUser($filterdata, $filterdata['id'], $filename);
            header('Location: /users');
        }
        else 
        {
            $usuario = getUser($request['params']['id'], $filename);
//             ob_start();
//                 include('../modules/application/src/application/views/users/update.php');
//                 $content = ob_get_contents();
//             ob_end_clean();
            $content = renderView($request, $config, array('usuario'=>$usuario));
        }
    break;
    default:
    case 'select':
        $usuarios = getUsers($filename);
        $content = renderView($request, $config, array('usuarios'=>$usuarios));        
    break;
    
    case 'delete':

        if($_POST)
        {
            if($_POST['submit']=='si')
            {
                deleteUser($filename,$_POST['id']);
            }
            // Saltar a select
            header('Location: /users');           
        }
        else 
        {
            ob_start();
                include('../modules/application/src/application/views/users/delete.phtml');
                $content = ob_get_contents();
            ob_end_clean();
        }
        
    break;
}




include('../modules/application/src/application/layouts/dashboard.phtml');




















