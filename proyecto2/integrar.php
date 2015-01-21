<?php

include ('tablaMultiplicar.php');
include ('fibonacci.php');
include ('dibujaArray.php');

$a = 5;
$b = 6;
$max = 60;

$tabla = tablaMultiplicar($a,$b);
$serie = fibonacci($max);

echo dibujaArray($tabla);
echo dibujaArray($serie);


levenshtein($str1, $str2);
soundex($str);


