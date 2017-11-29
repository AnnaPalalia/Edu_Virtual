<?php

/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:13 PM
 */
class Model
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new Database(DRIVER . ':host=' . DBSERVER . ';dbname=' . DBNAME, DBUSER, DBPSWD);

    }
}