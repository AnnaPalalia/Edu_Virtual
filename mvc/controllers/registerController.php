<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 02/02/2017
 * Time: 04:21 PM
 */
class registerController extends Controller
{
    private $_registro;
    public function __construct()
    {
        parent::__construct();
        $this->_registro=$this->loadModel('register');
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->setCss(['est']);
        $this->_view->setJS(['registro.']);
        $this->_view->rendering('pantRegister');
    }

    public function agregar()
    {
        print_r($_POST);
        $this->_registro->insertarReg($_POST['name'], $_POST['email'],$_POST['username'],$_POST['password']);
    }
}