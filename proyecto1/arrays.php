<?php

$a = array('rojo','verde','amarillo');


echo "<pre>";
print_r($a);
echo "<pre>";

$persona = array ('name'=>'Agustin',
                  'apellido'=>'calderon',
                  'color'=>'verde', 
                  'xñdlfj'=>2134,
                  'direccion'=>array('ciduad'=>'Valencia',
                                     'hotel'=>'Tactica'
                                    )
    
);

echo "<pre>";
print_r($persona);
echo "<pre>";

foreach ($persona as $key => $value)
{
    echo $key.": ".$value;
    echo "<br/>";
}
















