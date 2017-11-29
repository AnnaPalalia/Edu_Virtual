<?php

/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:13 PM
 */
abstract class Controller
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View(new Request());
    }

    abstract public function index();//siempre agregar una funcion en un abstract

    protected function loadModel($model)
    {

        $model = $model . 'Model';
        $routeModel = ROOT . 'models' . DS . $model . '.php';

        if(is_readable($routeModel)){
            require_once $routeModel;
            return new $model;
        }else{
            throw new Exception('No se encontro el modelo en:'.$routeModel);
        }
    }

    protected function getLibrary($library){
        $routeLibrary=ROOT.'libs'.DS.$library.'.php';
        //C://XAMPP/htdocs/mvc/libs/
        if (is_readable($routeLibrary)){
            require_once $routeLibrary;
        }else{
            throw new Exception('Libreria no encontrada en:'.$routeLibrary);
        }
    }
}