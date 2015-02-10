<?php
function updateUser($filterdata, $id, $filename)
{
    foreach($filterdata as $key => $value)
    {
        if (is_array($value))
            $filterdata[$key]=implode(",",$value);
    }
    $filterdata[]=$_FILES['photo']['name'];
    $filterdata = implode("|", $filterdata);
    
    // Leer el fichero usuarios.txt en un string
    $usuarios = getUsers($filename);
    
    // Sobreescribir la linea con los datos del usuario
    $usuarios[$id]=$filterdata;
    // juntar por saltos de linea en un string
    $usuarios = implode("\n", $usuarios);
    // Sobreescribir el archivo de texto
    file_put_contents($filename, $usuarios);
    return $id;
}