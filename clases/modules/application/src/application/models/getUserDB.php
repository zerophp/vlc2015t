<?php
function getUserDB($table, $id, $config)
{
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    // escribir la consulta a mano
    
    
    $gender = array('h'=>1,'m'=>2,'o'=>3);
    
    $sql = "SELECT * FROM ".$table." WHERE 
                iduser = '".$id."'";
    
    $result = mysqli_query($link, $sql);
    
    while($row = mysqli_fetch_array($result))
        $usuario[]=$row;
    
    return $usuario;
}