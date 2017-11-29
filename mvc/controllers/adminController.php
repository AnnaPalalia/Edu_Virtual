<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 23/08/2017
 * Time: 02:48 PM
 */
class adminController extends Controller
{
    private $_admi;

    public function __construct()
    {
        parent::__construct();
        $this->_admi = $this->loadModel('admiH');
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->mostrarH = $this->_admi->consultaAH();
        $this->_view->setCss(['admin']);
        $this->_view->rendering('admin');
    }
}