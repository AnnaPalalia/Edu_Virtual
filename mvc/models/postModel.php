<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 09/02/2017
 * Time: 04:20 PM
 */
class postModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertar($name, $contenido)
    {
        $fields = ['titulo' => $name, 'contenido' => $contenido];
        $table = 'blog';
        $result = $this->_db->insert($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function consulta()
    {
        $fields = ['id', 'titulo', 'contenido'];
        $table = 'blog';

        $result = $this->_db->select($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function buscarB($titulo)
    {
        //$titulo='mijael';
        $bin = [':titulo' => $titulo];//
        $fields = '*';
        $where = ['titulo' => ':titulo']; //id base de datos :id obtenida de html
        $table = 'blog';
        $result = $this->_db->select($table, $fields, $where, $bin);
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
        $table = 'blog';
        $result = $this->_db->delete($table, $where, $bin);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function modificar($id, $titulo, $contenido)
    {
        $bin = [':id' => $id];
        $fields = ['titulo' => $titulo, 'contenido' => $contenido];
        $where = ['id' => ':id'];
        $table = 'blog';
        $result=$this->_db->update($table,$fields,$where,$bin);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}


