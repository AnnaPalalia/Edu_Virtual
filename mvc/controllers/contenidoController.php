<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 10/02/2017
 * Time: 12:41 PM
 */
class contenidoController extends Controller
{
    private $_contenido;

    public function __construct()
    {
        parent::__construct();
        $this->_contenido = $this->loadModel('post');
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->mostrar = $this->_contenido->consulta();
        $this->_view->setJS(['buscador.']);
        $this->_view->setCss(['contEst']);
        $this->_view->rendering('contenido');// todos los rendering setCss van al ultimo
    }

    public function buscar()
    {
        //print_r($_POST);
        $resultado = $this->_contenido->buscarB($_POST['buscar']);
        echo json_encode($resultado);
    }

    public function elimina()
    {
        $this->_contenido->eliminar($_POST['id']);
    }

    public function modificarC()
    {
        //print_r($_POST);// Verificar que estoy mandando
        $this->_contenido->modificar($_POST['idP'], $_POST['nameM'], $_POST['contM']);
    }
}