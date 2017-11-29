<?php

/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:14 PM
 */
class View
{
    private $_controller;
    private $_js;
    private $_css;
    private $_routes;

    public function __construct(Request $request)
    {
        $this->_controller = $request->getController();
        $this->_routes['js'] = BASE_URL . '/views/' . $this->_controller . '/js/';
        $this->_routes['css'] = BASE_URL . '/views/' . $this->_controller . '/css/';
    }

    public function rendering($view, $item=false)
    {
            $menu = [
                /*[
                    'id' => 'inicio',
                    'title' => 'Inicio',
                    'link' => BASE_URL . 'index'
                ],*/
                [
                    'id' => 'registro',
                    'title' => 'Registro',
                    'link' => BASE_URL . 'register'
                ],
                /*[
                    'id' => 'pdf',
                    'title' => 'PDF',
                    'link' => BASE_URL . 'pdf'
                ],
                [
                    'id' => 'blog',
                    'title' => 'BLOG',
                    'link' => BASE_URL . 'blog'
                ],
                [
                    'id' => 'contenido',
                    'title' => 'Contenido del blog',
                    'link' => BASE_URL . 'contenido'
                ],
                [
                    'id' => 'video',
                    'title' => 'Video',
                    'link' => BASE_URL . 'video'
                ],
                [
                    'id' => 'formato',
                    'title' => 'Formato',
                    'link' => BASE_URL . 'formato'
                ],
                [
                    'id' => 'Admin',
                    'title' => 'Admin',
                    'link' => BASE_URL . 'admin'
                ]*/
            ];
        $js = [];
        if (count($this->_js)) {
            $js = $this->_js;
        }

        $css = [];
        if (count($this->_css)) {
            $css = $this->_css;
        }

        $_layoutParams = [
            'route_css' => BASE_URL . '/views/layout/' . DEFAULT_LAYOUT . '/css/',
            'route_js' => BASE_URL . '/views/layout/' . DEFAULT_LAYOUT . '/js/',
            'route_img' => BASE_URL . '/views/layout/' . DEFAULT_LAYOUT . '/img/',
            'css' => $css,
            'js' => $js,
            'menu' => $menu
        ];

        $routeView = ROOT . 'views' . DS . $this->_controller . DS . $view . '.phtml';
        if (is_readable($routeView)) {
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $routeView;
            include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } else {
            throw new Exception('Vista no encontrada en ' . $routeView);
        }
    }

    public function setJS(array $js)
    {
        if (is_array($js) && count($js)) {
            foreach ($js as $item) {
                $this->_js[] = $this->_routes['js'] . $item . 'js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }

    public function setCss(array $css)
    {
        if (is_array($css) && count($css)) {
            foreach ($css as $item) {
                $this->_css[] = $this->_routes['css'] . $item . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
}