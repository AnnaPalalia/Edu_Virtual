<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 07/02/2017
 * Time: 03:57 PM
 */
class blogController extends Controller
{
    private $_titulo;
    public function __construct()
    {
        parent::__construct();
        $this->_titulo=$this->loadModel('post');//establece conexion con la base de datos
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->setJS(['register.']);
        $this->_view->setCss(['blogEst']);
        $this->_view->rendering('blog');
        //$this->_view->mostrarblog=$this->_titulo->consulta();
        //print_r($this->_view->mostrarblog);

    }

    public function agregar(){
        $this->_titulo->insertar($_POST['name'],$_POST['contenido']);
    }

}