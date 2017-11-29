<?php
/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 04:11 PM
 */
class membersModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function getMembers(){
    $fields= ['id','username','email'];
    $table= 'members';

    $result = $this->_db->select($table,$fields);
    if (!empty($result)){
        return $result;
    }else{
        return 0;
    }
    }
}