<?php
/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:13 PM
 */
//Es un despachador busca archivo definido y lo manda
class Bootstrap{

    public static function run(Request $request){

        $controller = $request->getController().'Controller';
        $routeController = ROOT.'controllers'.DS.$controller.'.php';
        $method = $request->getMethod();
        $args = $request->getArguments();

        if(is_readable($routeController)) { //Verificar si el archivo esta en el directorio
            require_once $routeController;

            $controller = new $controller;
            if(is_callable([$controller, $method])){//Preguntar si existe el metodo
                $method = $request->getMethod();
            }else{
                $method='index';
            }
            if(isset($args)){
                call_user_func_array([$controller,$method],$args);
            }else{
                call_user_func([$controller, $method]);
            }

        }else{
            throw new Exception('Controlador no encontrado en:'.$routeController);
        }
    }
}