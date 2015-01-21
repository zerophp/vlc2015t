<?php
function tablaMultiplicar($paramFilas, $paramCol)
{   
    $tablaMul = array();   
    for($i = 0; $i < $paramFilas; $i++)
    {
        for($j = 0; $j < $paramCol; $j++)
        {
            if ($i == 0){
                $tablaMul[$i][$j] = $j;
            }
            else if ($j == 0){
                $tablaMul[$i][$j] = $i;
            }
            else{
                $tablaMul[$i][$j] = $i*$j;
            }            
        }
    }    
    return $tablaMul;
}