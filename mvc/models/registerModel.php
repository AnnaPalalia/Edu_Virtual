<?php
/**
 * Created by PhpStorm.
 * User: mijae
 * Date: 15/11/2017
 * Time: 10:27 PM
 */
class registerModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertarReg($nombre,$correo,$username,$contra)
    {
        $fields = ['nombre' => $nombre, 'correo' => $correo,'username' => $username,'pass'=>$contra];
        $table='formulario';
        $result = $this->_db->insert($table, $fields);
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}