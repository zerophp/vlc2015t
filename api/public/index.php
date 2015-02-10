<?php

require_once ('../autoload.php');


if(getenv('APPLICATION_ENV')!='development')
    $config = 'configs/application.php';
else
    $config = 'configs/application.development.php';



$fc = core\models\FrontController::getInstance($config);
$fc->dispatch();


// $config = array('db' => array('host'=>'localhost',
//                     'user'=>'root',
//                     'password'=>'1234',
//                     'database'=>'crud'
//                 ),
//     'view_path'=>'../modules/application/src/application/views',
// );

// $request = array('controller'=>'application\controllers\Users',
//                       'action'=>'select'
//                       );

// $index = new application\controllers\Users($request,$config);
// echo $index -> select();


// $index = new application\controllers\Users();
// $index->setConfig($config);
// $index->setRequest($request);
// echo $index -> select();







