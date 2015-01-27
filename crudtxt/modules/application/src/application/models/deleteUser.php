<?php

function deleteUser($filename, $id)
{
    $usuarios = getUsers($filename);
    // Eliminar el usuario id
    unset($usuarios[$id]);
    // juntar por saltos de linea en un string
    $usuarios = implode("\n", $usuarios);
    // Sobreescribir el archivo de texto
    file_put_contents($filename, $usuarios);
    return $id;    
}
