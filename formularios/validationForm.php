<?php

/**
 * Validate input data form
 * 
 * @param array $form definition
 * @param array $filterdata 
 * @return array array('fieldname'=>'error message') | TRUE
 */
function validationForm($form, $filterdata)
{
    return $validation;
}

foreach($form as $key => $value)
{
    if(isset($value['validation']) && is_array($value['validation']))
    foreach($value['validation'] as $key2 => $value)
    {
        switch ($key2)
        {
            case 'require':
                
            break;
            case 'maxsize':
                
            break;
            
                
                
        }
    }
}

$userForm=array(
    'id'=>array(
        'label'=>null,
        'type'=>'hidden',
        'value'=>1,
    ),
    'name'=>array(
        'label'=>'Nombre',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array('required'=>TRUE,
            'maxsize'=>20,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),

    ),
    'email
    
    