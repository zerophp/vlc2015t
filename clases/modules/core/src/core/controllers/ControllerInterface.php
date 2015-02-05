<?php
namespace core\controllers;

interface ControllerInterface
{
    public function setRequest($request);
    public function setConfig($config);
}