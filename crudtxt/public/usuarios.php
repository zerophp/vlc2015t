<?phP

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

require_once ('../modules/application/src/application/forms/userForm.php');
require_once ('../modules/core/src/core/forms/filterForm.php');
require_once ('../modules/application/src/application/models/getUsers.php');
require_once ('../modules/application/src/application/models/deleteUsers.php');

require_once ('../modules/core/src/core/model/getConfig.php');

$config = getConfig();
$filename= $config['filename'];

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch($action)
{
    case 'insert':        
        if($_POST)
        {            
            $filterdata = filterForm($userForm, $_POST);
            // $validationdata = validationForm($userForm, $filterdata);
            if(TRUE)    // VALIDACION
            {
                insertUser($filterdata, $filename);
            }
            header('Location: /usuarios.php');            
        }        
        else
            include('../modules/application/src/application/views/insert.php');            
    break;
        
    case 'update':
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            // Validar el formulario
            updateUser($filterdata, $filterdata['id'], $filename);
            header('Location: /usuarios.php');
        }
        else 
        {
            $usuario = getUser($_GET['id'], $filename);
            include('../modules/application/src/application/views/update.php');
        }
    break;
    default:
    case 'select':
        $usuarios = getUsers($filename);
        include('../modules/application/src/application/views/select.phtml');        
    break;
    
    case 'delete':

        if($_POST)
        {
            if($_POST['submit']=='si')
            {
                deleteUsers($filename,$_POST['id']);
            }
            // Saltar a select
            header('Location: /usuarios.php');           
        }
        else 
        {
            include('../modules/application/src/application/views/delete.phtml');
        }
        
    break;
}























