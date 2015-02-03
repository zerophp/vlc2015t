<?php

function updateUserDB($filterdata, $tablename, $config, $id)
{
    // Conectarse al DBMS
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    // escribir la consulta a mano
    
    unset($filterdata['iduser']);
    
    
    $sql = "describe ".$tablename;
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result))
        $columns[]=$row;
    
    foreach ($columns as $value)
        $columns2[]=$value['Field'];
    
    $array = array_intersect(array_keys($filterdata), $columns2);
    
    
    $sql =array();
    foreach ($array as $value)
    {
        $sql[]=$value."='".$filterdata[$value]."'";
    }
     
    $sql = "UPDATE ".$tablename." SET ".implode(',',$sql).
            " WHERE iduser='".$id."'";
 
    return mysqli_query($link, $sql);
}