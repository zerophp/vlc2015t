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
    $validation = array();

    foreach ($form as $key => $value) {
        if (isset($value['validation']) && is_array($value['validation']))
            foreach ($value['validation'] as $key2 => $value2) {
                switch ($key2) {
                    case 'required':
                        if ($value['validation']['required'] === TRUE)
                            if (! isset($filterdata[$key]) or $filterdata[$key] == '') {
                                if (isset($value['validation']['error_message']))
                                    $validation[$key] = $value['validation']['error_message'];
                                else
                                    $validation[$key] = 'ERROR';
                            }
                        break;
                    case 'maxsize':
                        if ($value['validation']['maxsize'] === 20){
                            if (strlen($filterdata[$key]) > 20) {
                                if (isset($value['validation']['error_message']))
                                    $validation[$key] = $value['validation']['error_message'];
                                else
                                    $validation[$key] = 'ERROR';
                            }
                        } else if ($value['validation']['maxsize'] === 12){
                            if (strlen($filterdata[$key]) > 12) {
                                if (isset($value['validation']['error_message']))
                                    $validation[$key] = $value['validation']['error_message'];
                                else
                                    $validation[$key] = 'ERROR';
                            }
                        }
                        break;
                    case 'minsize':
                        if ($value['validation']['minsize'] === 3)
                            if (strlen($filterdata[$key]) < 3) {
                                if (isset($value['validation']['error_message']))
                                    $validation[$key] = $value['validation']['error_message'];
                                else
                                    $validation[$key] = 'ERROR';
                            }
                        break;
                    case 'email':
                        if ($value['validation']['email'] === TRUE)
                            if (! filter_var($filterdata[$key], FILTER_VALIDATE_EMAIL)) {
                                if (isset($value['validation']['error_message']))
                                    $validation[$key] = $value['validation']['error_message'];
                                else
                                    $validation[$key] = 'ERROR';
                            }
                        break;
                }
            }
    }
    if (empty($validation))
        return TRUE;
    return $validation;
}


