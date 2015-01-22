<?phP

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

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
                $filterdata[]=$_FILES['photo']['name'];
                file_put_contents('usuarios.txt', implode("|",$filterdata)."\n", FILE_APPEND);
            }
            header('Location: /usuarios.php');
            
        }
        
        else
            include('insert.php');
            
    break;
    
    case 'update':
        echo "esto es update";
        if($_POST)
        {
            include ('filterForm.php');
            // Filtrar el formulario
            $filterdata = filterForm($userForm, $_POST);
            // Validar el formulario
            // convertir en un string separado por pipes y comas los multiples
            foreach($filterdata as $key => $value)
            {
                if (is_array($value))
                    $filterdata[$key]=implode(",",$value);                   
            }
            $filterdata[]=$_FILES['photo']['name'];
            $filterdata = implode("|", $filterdata);
            // Leer el fichero usuarios.txt en un string
            $usuarios = file_get_contents('usuarios.txt');
            // Separar el fichero por saltos de linea en un array
            $usuarios = explode("\n", $usuarios);
            // Sobreescribir la linea con los datos del usuario
            $usuarios[$filterdata['id']]=$filterdata;            
            // juntar por saltos de linea en un string
            $usuarios = implode("\n", $usuarios);
            // Sobreescribir el archivo de texto
            file_put_contents('usuarios.txt', $usuarios);
            // Saltar a select
            header('Location: /usuarios.php');
        }
        else 
        {
            
            // Tomar el id del usuario
            $id=$_GET['id'];
            // Leer un un string el archivo usuarios.txt
            $usuarios = file_get_contents('usuarios.txt');            
            // dividir el string en un array
            $usuarios = explode("\n", $usuarios);
            // tomar el usuario id
            $usuario = $usuarios[$id];
            // dividir el usuario por pipes
            $usuario = explode ("|", $usuario);
            $usuario[7]=explode(",",$usuario[7]);
            $usuario[8]=explode(",",$usuario[8]);
            $usuario[0]=$id;
            echo "<pre>";
            print_r($usuario);
            echo "</pre>";
            
            // Mostrar el formulario
            include('update.php');
        }
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
        echo "esto es delete";
        if($_POST)
        {
            // Tomar el id del usuario
            $id=$_POST['id'];            
            // Leer el fichero usuarios.txt en un string
            $usuarios = file_get_contents('usuarios.txt');
            // Separar el fichero por saltos de linea en un array
            $usuarios = explode("\n", $usuarios);
            
            // Eliminar el usuario id
            unset($usuarios[$id]);
            // juntar por saltos de linea en un string            
            // Sobreescribir el archivo de texto
            unlink('usuarios.txt');
            foreach ($usuarios as $key => $value)
            {   
                if(!empty($value)){
                    if(count($usuarios) != $key)
                    {
                        $value = $value."\n";
                    }
                    file_put_contents('usuarios.txt', $value, FILE_APPEND);
                }
            
            }
            // Saltar a select
            header('Location: /usuarios.php');           
        }
        else 
        {
            $html="<form action=\"usuarios.php?action=delete\" method=\"POST\" ><input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\" /><input type=\"submit\" name=\"submit\"/ value=\"si\"></form>";
            $html.="<form action=\"usuarios.php?action=insert\" method=\"GET\" ><input type=\"submit\" name=\"submit\"/ value=\"no\"></form>";
            echo $html;
        
        }
        
    break;
}























