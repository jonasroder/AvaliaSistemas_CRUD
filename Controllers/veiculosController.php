<?php

Class veiculosController extends Controller{

    public function index(){

        $n= new veiculos();
        $resultadoVeiculos = $n -> buscarListaVeiculos();
        $dados = json_encode($resultadoVeiculos);

        $acao = "u"; //update

        $this->carregarTemplate('veiculos', $acao, $dados);
    }

}