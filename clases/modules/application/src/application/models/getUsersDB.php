<?php
function getUsersDB($table, $config)
{
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    
    mysqli_select_db($link, $config['db']['database']);
    
    $query = "SELECT * FROM ".$table;
    //echo $query;
    
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_assoc($result))
        $usuarios2[]=$row;
    
    foreach ($usuarios2 as $values)
        $usuarios[] = implode("|", $values);
    
    return $usuarios;
}
