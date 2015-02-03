<?php


use core\models\Dispatch;
require_once ('../autoload.php');


$config = core\models\CoreConfig::getConfig();
$MysqlAdapter = new core\adapters\MysqlAdapter($config['db']);


    

require_once ('../modules/core/src/core/models/parseUrl.php');

$request = parseURL();
//$request = routeUrl($request);

$dispatch = new core\models\Dispatch($request);
$dispatch->run();









