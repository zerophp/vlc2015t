<?php
/**
 * Get user from txt file
 * 
 * @param integer $id
 * @param string $filename
 * @return array: user
 */
function getUser($id, $filename)
{
    // Leer un un string el archivo usuarios.txt
    $usuarios = file_get_contents($filename);            
    // dividir el string en un array
    $usuarios = explode("\n", $usuarios);
    // tomar el usuario id
    $usuario = $usuarios[$id];
    // dividir el usuario por pipes
    $usuario = explode ("|", $usuario);
    $usuario[7]=explode(",",$usuario[7]);
    $usuario[8]=explode(",",$usuario[8]);
    $usuario[0]=$id;
    
    return $usuario;
}