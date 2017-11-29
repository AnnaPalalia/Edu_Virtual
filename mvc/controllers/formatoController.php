<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 03/08/2017
 * Time: 01:56 PM
 */
class formatoController extends Controller
{
    private $_formato, $_historial;

    public function __construct()
    {
        parent::__construct();
        $this->_formato = $this->loadModel('formato');
        $this->_historial = $this->loadModel('admiH');
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->mostrarF = $this->_formato->consultaF();
        $this->_view->boxT=$this->_formato->box();
        $this->_view->setCss(['formatoS']);
        $this->_view->setJS(['formato.']);
        $this->_view->rendering('formato');
    }

    public function agregarF()
    {
        print_r($_POST);// Verificar que estoy mandando
        $this->_formato->insertarF($_POST['NInventario'], $_POST['descri'], $_POST['marca'], $_POST['modelo'], $_POST['serie'], $_POST['obs'], $_POST['Fnu'], $_POST['ag']);
        $this->_historial->insertarAdmiH($_POST['NInventario'], $_POST['descri'], $_POST['marca'], $_POST['modelo'], $_POST['serie'], $_POST['obs'], $_POST['Fnu'], $_POST['ag']);
    }

    public function modificarForm()
    {
        //print_r($_POST);// Verificar que estoy mandando
        $this->_formato->modificarF($_POST['idE'], $_POST['NInventarioE'], $_POST['descriE'], $_POST['marcaE'], $_POST['modeloE'], $_POST['serieE'], $_POST['obsE'], $_POST['fe'], $_POST['modi']);
        $this->_historial->insertarAdmiH($_POST['idE'], $_POST['NInventarioE'], $_POST['descriE'], $_POST['marcaE'], $_POST['modeloE'], $_POST['serieE'], $_POST['obsE'], $_POST['fe'], $_POST['modi']);
    }

    public function eliminaForm()
    {
        //print_r($_POST);// Verificar que estoy mandando
        $this->_formato->eliminarF($_POST['id']);
        $this->_historial->insertarAdmiH($_POST['id'],$_POST['invt'],$_POST['bien'],$_POST['marca'],$_POST['modelo'],$_POST['serie'],$_POST['obs'],$_POST['fe'],$_POST['accion']);
    }
}