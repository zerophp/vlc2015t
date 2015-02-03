<?php

/*
 * Dispositivo de hardware para interactuar con el ordenador
 * ha de ser economico,
 *
 */

class hardware
{
    public $precio;
    private $num_piezas;
    
    public function getNumPiezas();
}

class dispositivo extends hardware
{
    public $conexion;    
    public function configurar();
}

interface mouse extends dispositivo
{
    public $num_botones;
    public $tipo_sensor;    
    
    public function desplazar();    
    public function clickar();
    public function dobleClickar();
    public function clickDerecho();
}

class mouse implements mouse
{
    mjs
}


$mouse_uno = new mouse();
$mouse_dos = new mouse();

class ordenador
{
    var $tipo_conexion;
    var $driver;   
    
    function user_driver();
    
}

class puntero
{
    var $cordenadaX;
    var $cordenadaY;
    var $tipo;
    
    function setCoordenadas();
    function getCoordenadas();
    
    
    
}



