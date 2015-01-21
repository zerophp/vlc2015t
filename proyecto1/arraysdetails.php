<?php
$persona = array ('name'=>'Agustin',
                  'apellido'=>'calderon',
                  'color'=>'verde', 
                  'xñdlfj'=>2134,
//                   'direccion'=>array('ciduad'=>'Valencia',
//                                      'hotel'=>'Tactica'
//                                     ),
                  12=>12,
                  13=>14,
                  15=>16,
                  17,18=>20,
                  FALSE=>'aaaaaa',
                  1.2=>'25',
                  '8'=>'esto que',
                  '5.5'=>'jajaja',
                  _=>'ñañañaña',
                  '15'=>'valor'
                  
    
);

echo "<pre>";
print_r($persona);
echo "<pre>";




foreach ($persona as $key => $value)
{
    echo $key.": ".$value;
    echo "<br/>";
}
