<?php

function dibujaArray($array){   

    $output = "<ul>";

    foreach ($array as $key => $value){
        if(is_array($value)){
            $output .= "<li>".$key."<ul>".dibujaArray($value)."</ul></li>";
        }else{
            $output .= "<li>".$value."</li>";
        }
        
    }
    
    $output .= "</ul>";
    return $output;
};

$myArray = array(
                "item1",
                "item2",
                "item3" => array("subitem1","subitem2","subitem3" =>array("subitem1","subitem2","subitem3")),
                "item4", 
            );

$output = dibujaArray($myArray);

echo $output;