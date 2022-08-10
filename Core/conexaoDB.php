<?php

class db
{

    private static $instancia;
    private static $error;
    private static $servername = "localhost";
    private static $database = "avaliasistemas";
    private static $username = "root";
    private static $password = "root";

    public static function runSql($sql)
    {

        if (!isset(self::$instancia)) {

            try {
                self::$instancia = mysqli_connect(self::$servername, self::$username, self::$password, self::$database);
            } catch (Exception $e) {
                self::$error = $e;
            }
        }

        $response = self::$instancia->query($sql);

        if ($response) {

            if ($response->num_rows >= 1) {
                
                $data['dados'] = $response->fetch_all(MYSQLI_ASSOC);
                $data['numRows'] = $response->num_rows;
            }

            $data['sql'] = $sql;
            $data['error'] = self::$error;

            return $data;
        } else {
            $data['error'] = "Erro, Verifique sua Consulta: " . $sql;
        }
    }


    public function verificarColunasdaTabela($tabela)
    {
        $sql = "desc  " .$tabela . "";
        $res = db::runSql($sql)['dados'];
        return $res;
    }
}
