<?php

$db = array('host'=>'localhost',
      'user'=>'php',
      'password'=>'1234',
      'database'=>'crud'
);





$link = mysqli_connect($db['host'],$db['user'],$db['password']);
mysqli_select_db($link, $db['database']);

$query = "SELECT name, email FROM users";
echo $query;

$result = mysqli_query($link, $query);

while($row = mysqli_fetch_assoc($result))
{
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

