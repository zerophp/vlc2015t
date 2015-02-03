<?php

function deleteUserDB($table, $id, $config)
{
    // Conectarse al DBMS
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    // escribir la consulta a mano
    
    $sql = "DELETE FROM ".$table." WHERE iduser='".$id."'";

    return mysqli_query($link, $sql);
}
