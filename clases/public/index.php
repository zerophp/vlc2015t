<?php

require_once ('../autoload.php');


if(getenv('APPLICATION_ENV')!='development')
    $config = 'configs/application.php';
else
    $config = 'configs/application.development.php';



$fc = core\models\FrontController::getInstance($config);
$fc->dispatch();