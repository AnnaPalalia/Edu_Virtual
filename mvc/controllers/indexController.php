<?php

/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:55 PM
 */
class indexController extends Controller
{
    private $_members;
    public function __construct()
    {
        parent::__construct();//llama al constructor de la clase padre
        $this->_members = $this->loadModel('members');
    }

    public function index()
    {
        // TODO: Implement index() method.
        //echo 'Hola mundo desde index';
        $this->_view->setCss(['index-core']);
        $this->_view->rendering('pantalla');
        /*$this->_view->title = 'Pagina 1';
        $this->_view->memberList=$this->_members->getMembers();
        print_r($this->_view->memberList);*/
    }
}