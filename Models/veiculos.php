<?php

Class veiculos{

    public function findAll(){
        $sql = "SELECT * FROM veiculos";
        $res = db::runSql($sql)['dados'];

        return $res;
    }
    
}