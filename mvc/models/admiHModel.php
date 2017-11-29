<?php

/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 05/10/2017
 * Time: 10:02 PM
 */
class admiHModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarAdmiH($id, $inventario, $bien, $marca, $modelo, $serie, $obs, $fe, $mo)
    {
        $fields = ['id_form' => $id, 'inventario' => $inventario, 'bien' => $bien, 'marca' => $marca, 'modelo' => $modelo, 'serie' => $serie, 'obs' => $obs, 'fechaMod' => $fe, 'accion' => $mo];
        $table = 'historial';
        $result = $this->_db->insert($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function consultaAH()
    {
        //$fields = ['id','inventario', 'bien', 'marca','modelo','serie','obs',];
        $fields = '*';
        $table = 'historial';
        $result = $this->_db->select($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}