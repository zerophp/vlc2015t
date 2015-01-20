<?php
include ('dibujaArray.php');

$myArray = array(
    "item1",
    "item2",
    "item3" => array("subitem1","subitem2","subitem3" =>array("subitem1","subitem2","subitem3")),
    "item4",
);

$output = dibujaArray($myArray);

echo $output;