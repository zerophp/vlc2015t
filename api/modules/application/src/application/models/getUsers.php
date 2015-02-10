<?php


function getUsers($filename)
{
    // Leer usuarios.txt en un string
    $usuarios = file_get_contents($filename);
    
    // Separar cada linea en un array
    $usuarios = explode("\n", $usuarios);
    
    return $usuarios;
}