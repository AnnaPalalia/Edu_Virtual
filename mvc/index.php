<?php
/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:18 PM
 */

define ('DS',DIRECTORY_SEPARATOR);// DS =/
define('ROOT',realpath(dirname(__FILE__)).DS);
define('APP_PATH',ROOT.'application'.DS);

require_once APP_PATH.'Config.php';
require_once APP_PATH.'Request.php';
require_once APP_PATH.'Bootstrap.php';
require_once APP_PATH.'Controller.php';
require_once APP_PATH.'Model.php';
require_once APP_PATH.'View.php';
require_once  APP_PATH.'Database.php';

try {
    Bootstrap::run(new Request());
}catch (Exception $exception){
    echo $exception->getMessage();
}