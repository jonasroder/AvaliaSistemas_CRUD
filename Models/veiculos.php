<?php

Class veiculos{

    public function buscarListaVeiculos(){
        $sql = "SELECT * FROM usuarios";
        $res = db::runSql($sql)['dados'];

        return $res;
    }
    
}