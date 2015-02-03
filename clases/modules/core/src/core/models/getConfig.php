<?php

function getconfig()
{
   include_once('../configs/local.php');
   $config_local = $config;
   
   include_once('../configs/global.php');
   $config_global = $config;

   $config = array_merge($config_global, $config_local);
  
   return $config;    
}