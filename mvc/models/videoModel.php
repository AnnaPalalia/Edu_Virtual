<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 07/06/2017
 * Time: 04:08 PM
 */
class videoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertar($titulo, $contenido)
    {
        $fields = ['nombre' => $titulo, 'url' => $contenido];
        $table = 'video';
        $result = $this->_db->insert($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function consulta()
    {
        $fields = ['id', 'nombre', 'url'];
        $table = 'video';
        $result = $this->_db->select($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
    public function modificar($id, $nombre, $url)
    {
        $bin = [':id' => $id];
        $fields = ['nombre' => $nombre, 'url' => $url];
        $where = ['id' => ':id'];
        $table = 'video';
        $result=$this->_db->update($table,$fields,$where,$bin);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
    public function eliminar($id)
    {
        //$id='2';
        $bin = [':id' => $id];
        //$fields='*';
        $where = ['id' => ':id']; //id base de datos :id obtenida de html
        $table = 'video';
        $result = $this->_db->delete($table, $where, $bin);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}