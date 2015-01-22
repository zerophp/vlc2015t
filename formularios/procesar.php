<?php
echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

// echo "<pre>Files: ";
// print_r($_FILES);
// echo "</pre>";

include ('userForm.php');
include ('filterForm.php');
include ('validationForm.php');
include ('renderForm.php');

$filterdata = filterForm($userForm, $_POST);
// echo "<pre>";
// print_r($filterdata);
// echo "<pre>";

$validationdata = validationForm($userForm, $filterdata);
echo "<pre>";
print_r($validationdata);
echo "<pre>";

// echo renderForm($userForm, $filterdata);


if($validationdata)
{    
    foreach ($filterdata as $key => $value)
    {
        if(is_array($value))
            $filterdata[$key]=implode(',',$value);        
    }
    file_put_contents('usuarios.txt', implode("|",$filterdata)."\n", FILE_APPEND);    
}





















