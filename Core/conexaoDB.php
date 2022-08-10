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
            $numRows = mysqli_num_rows($response);
            $dataResponse = [];

            if ($numRows > 0) {
                while ($row = $response->fetch_array(MYSQLI_ASSOC)) {
                    $dataResponse[] = $row;
                }
            }

            $data['numRows'] = $numRows;
            $data['dados'] = $dataResponse;
            $data['sql'] = $sql;
            $data['error'] = self::$error;

            return $data;
        } else {
            $data['error'] = "Erro, Verifique sua Consulta: " . $sql;
        }
    }


    public function verificarColunasdaTabela($tabela){
        $sql = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA. COLUMNS
        WHERE TABLE_SCHEMA = '".self::$database."'
        AND TABLE_NAME = 'veiculos'
        AND COLUMN_KEY = 'PRI'";
        $res = db::runSql($sql)['dados'][0]['COLUMN_NAME'];
        return $res;
    }
}
