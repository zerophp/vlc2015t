<?php

function dibujaArray($array)
{   
    $output = "<ul>";
    foreach ($array as $key => $value)
    {
        if(is_array($value))
        {
            $output .= "<li>".$key."<ul>".dibujaArray($value)."</ul></li>";
        }
        else
        {
            $output .= "<li>".$value."</li>";
        }        
    }    
    $output .= "</ul>";
    return $output;
}