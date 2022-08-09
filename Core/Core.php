<?php

class Core
{
    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        if (isset($_GET['pag'])) {
            $url = $_GET['pag'];
        }

        //Possui informação apos dominio www.site.com/classe/função/parametro
        if (!empty($url)) {
            $url = explode('/', $url);
            $controller = $url[0].'Controller';
            array_shift($url);

            if(isset($url[0]) && !empty($url[0])){
                $metodo = $url[0];
                array_shift($url);    
            } else{
                $metodo = 'index';
            }
            array_shift($url);

            if(count($url) > 0){
                $parametros = $url;
            } else {
                $parametros = array();
            }

        } else {
            $controller = 'veiculosController';
            $metodo = 'index';
            $parametros = array();
        }

        $caminho = 'AvaliaSistemas_CRUD/Controllers/'.$controller.'.php';

        if(!file_exists($caminho) && !method_exists($controller, $metodo)){
            $controller = 'veiculosController';
            $metodo = 'index';
        }

        
        $c = new $controller;

        call_user_func_array(array($c,$metodo), $parametros);
    }
}
