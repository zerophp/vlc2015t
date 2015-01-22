<?php

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





















