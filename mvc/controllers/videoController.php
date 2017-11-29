<?php
/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 07/06/2017
 * Time: 03:54 PM
 */
class videoController extends Controller
{
    private $_video;

    public function __construct()
    {
        parent::__construct();
        $this->_video = $this->loadModel('video');
    }

    public function index()
    {
        // TODO: Implement index() method.
        $this->_view->mostrarT=$this->_video->consulta();
        $this->_view->setCss(['TVideo']);
        $this->_view->setJS(['video.']);
        $this->_view->rendering('video');// todos los rendering setCss van al ultimo
    }

    public function agregar()
    {
        $this->_video->insertar($_POST['videoT'], $_POST['videoD']);
    }

    public function modificarV()
    {
        $this->_video->modificar($_POST['idE'], $_POST['videoTE'], $_POST['videoDE']);
    }
    public function elimina()
    {
        $this->_video->eliminar($_POST['id']);
    }
}