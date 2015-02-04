<?php

require_once ('../autoload.php');


if(getenv('APPLICATION_ENV')!='development')
    $config = 'config/application.php';
else
    $config = 'config/application.development.php';

$fc = core\models\FrontController::getInstance();
$fc->dispatch();