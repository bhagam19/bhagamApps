<?php
require_once("modelo/index.php");
class modeloController{
    private $model;
    public function __construct(){
        $this->model=new Modelo();
    }
    static function index(){
        $producto=new Modelo();
        $dato=$producto->mostrar("productos","1");
        require_once("vista/index.php");
    }
}