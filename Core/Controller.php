<?php
require_once 'conexaoDB.php';

class Controller extends db
{
    public $dados;

    public function __construct()
    {
        $this->dados = array();
    }

    public function carregarTemplate($nomeView, $acao, $dadosModel = array())
    {
        $this->dados = $dadosModel;
        require_once 'Views/teamplate.php';
    }

    public function carregarViewNoTeamplate($nomeView, $acao, $dadosModel = array())
    {
        $this->dados = $dadosModel;
        require_once 'Views/'.$nomeView.'.php';
    }
}
