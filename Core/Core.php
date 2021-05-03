<?php
Class Core {
    public function __construct() {
        $this->Run();
    }
    public function Run() {
//         $parametros = array();
//        if (isset($_GET['pag']) && !empty($_GET['pag'])):
//            $url = $_GET['pag'];
//            $url = explode('/', $url);
//            if (file_exists('Controllers/' . $url[0] . 'Controller.php')):
//                $controller = $url[0] . 'Controller';
//                $metodo = 'index';
//                if (method_exists($controller, $url[1])):
//                    $metodo = $url[1];
//               
//                endif;
//          
//                if(isset($url[2]) && !empty($url[2])):
//                    $parametros = $url[2];
//                endif;
//            else:
//                $controller = 'homeController';
//                $metodo = 'index';
//            endif;
//        else:
//            $controller = 'homeController';
//            $metodo = 'index';
//        endif;
//        
//        $c = new $controller;
//        call_user_func_array(array($c, $metodo), $parametros);
        $parametros = array();
        //pega a string depois do dominio do site
        if (isset($_GET["pag"])) {
            $url = $_GET["pag"];
        }
        
        //possui informação após dominio;
        if (!empty($url)) {
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);
            $controller = $url[0] . "Controller"; //noticiaController
            array_shift($url);
            //se o usuario mandou função
            if (isset($url[0]) && !empty($url[0])) {
                $metodo = $url[0];
                array_shift($url);
            } else {
                //mandou somente a classe
                $metodo = 'index';
            }
            
            if (count($url) > 0) {
                $parametros = $url;
            }
        } else {
            
            $controller = 'homeController';
            $metodo = 'index';
        }
        $caminho = "Controllers/$controller.php";
        if (!file_exists($caminho) && !method_exists($controller, $metodo)){
            $controller = 'homeController';
            $metodo = 'index';
            
        }
        $c = new $controller;
        
        call_user_func_array(array($c, $metodo), $parametros);
    }
}
