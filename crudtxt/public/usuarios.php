<?phP

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch($action)
{
    case 'insert':
        
        if($_POST)
        {
            include ('userForm.php');
            include ('filterForm.php');
            //include ('validationForm.php');
            //include ('renderForm.php');
            
            $filterdata = filterForm($userForm, $_POST);
            // $validationdata = validationForm($userForm, $filterdata);
            
            if(TRUE)    // VALIDACION
            {
                foreach ($filterdata as $key => $value)
                {
                    if(is_array($value))
                        $filterdata[$key]=implode(',',$value);
                }
                file_put_contents('usuarios.txt', implode("|",$filterdata)."\n", FILE_APPEND);
            }
            header('Location: /usuarios.php');
            
        }
        
        else
            include('insert.php');
            
    break;
    
    case 'update':
    break;
    default:
    case 'select':

        // Leer usuarios.txt en un string
        $usuarios = file_get_contents('usuarios.txt');
        
        // Separar cada linea en un array
        $usuarios = explode("\n", $usuarios);
        
        // Recorrer el array
        // Dibujar la tabla
        $html="<a href=\"usuarios.php?action=insert\">Insert</a>";
        $html.="<table border=1>";
        foreach ($usuarios as $key => $usuario)
        {
            // Dibujar la fila
            $html.="<tr>";
            //Separar por pipes
            $usuario = explode("|", $usuario);
            foreach($usuario as $key2 => $data)
            {
                // Dibujar las columnas
                $html.="<td>";
                $html.=$data;
                $html.="</td>";
            }
        
            $html.="<td>";
            $html.="<a href=\"usuarios.php?action=update&id=".$key."\">Update</a> | ";
            $html.="<a href=\"usuarios.php?action=delete&id=".$key."\">Delete</a>";
            $html.="</td>";
             
            $html.="</tr>";
        }
        $html.="</table>";
        
        echo $html;
    break;
    
    case 'delete':
    break;
}























