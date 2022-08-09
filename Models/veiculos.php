<?php

Class veiculos{

    public function buscarListaVeiculos(){
        $sql = "SELECT * FROM veiculos";
        $res = db::runSql($sql)['dados'];

        return $res;
    }
    
}