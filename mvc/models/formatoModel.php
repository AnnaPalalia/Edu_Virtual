<?php
/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 04/08/2017
 * Time: 03:29 PM
 */
class formatoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function box()
    {
        $fields=['id_tp','desc_tipo'];
        $table='tipo';
        $result=$this->_db->select($table,$fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function insertarF($inventario, $bien, $marca, $modelo, $serie, $obs, $Fn, $ag)
    {
        $fields=['inventario'=>$inventario,'bien'=>$bien,'marca'=>$marca,'modelo'=>$modelo,'serie'=>$serie,'obs'=>$obs,'fechaMod'=>$Fn,'accion'=>$ag];
        $table='formato';
        $result=$this->_db->insert($table,$fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function consultaF()
    {
        //$fields = ['id','inventario', 'bien', 'marca','modelo','serie','obs',];
        $fields='*';
        $table = 'formato';
        $result = $this->_db->select($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function modificarF($id, $inventario,$bien,$marca,$modelo,$serie,$obs,$fe,$mo)
    {
        $bin = [':id_form' => $id];
        $fields = ['inventario'=>$inventario,'bien'=>$bien,'marca'=>$marca,'modelo'=>$modelo,'serie'=>$serie,'obs'=>$obs,'fechaMod'=>$fe,'accion'=>$mo];
        $where = ['id_form' => ':id_form'];
        $table = 'formato';
        $result=$this->_db->update($table,$fields,$where,$bin);

        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }

    public function eliminarF($id)
    {
        //$id='2';
        $bin = [':id_form' => $id];
        //$fields='*';
        $where = ['id_form' => ':id_form']; //id base de datos :id obtenida de html
        $table = 'formato';
        $result = $this->_db->delete($table, $where, $bin);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}