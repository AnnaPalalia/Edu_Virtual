<?php
/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:14 PM
 */

class Request{
    private $_controller;
    private $_method;
    private $_arguments;

    public function __construct()
    {
        if (isset($_GET['url'])){
            $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);//limpia el url
            $url = explode('/',$url);//Cada que encuentra un / los divide en un arreglo
            $url = array_filter($url);//omite caracteres vacios o basura

            $this->_controller =array_shift($url);//optiene primer elemento
            $this->_method = array_shift($url);
            $this->_arguments = $url;
        }
        if (!$this->_controller){
            $this->_controller = DEFAULT_CONTROLLER;//Si no encuentra la paguina te regresa a inicio(index)
        }

        if (!$this->_method){
            $this->_method = 'index';
        }

        if (!isset($this->_arguments)){
            $this->_arguments = [];
        }
    }
    public function getController() //get o set pedir permiso en atrubutis private
    {
        return $this->_controller;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getArguments()
    {
        return $this->_arguments;
    }
}