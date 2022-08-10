<?php

Class veiculosController extends Controller{

    public function index(){

        $veiculosModel= new veiculos();
        $veiculos = json_encode($veiculosModel->findAll());

        $this->carregarTemplate('veiculos', $veiculos);
    }

}