<?php

class db
{

    private static $instancia;
    private static $error;

    public static function runSql($sql)
    {

        if (!isset(self::$instancia)) {
            $servername = "localhost";
            $database = "avaliasistemas";
            $username = "root";
            $password = "root";

            try {
                self::$instancia = mysqli_connect($servername, $username, $password, $database);
            } catch (Exception $e) {
                self::$error = $e;
            }
        }

        $response = self::$instancia->query($sql);

        while ($row = $response->fetch_array(MYSQLI_ASSOC)) {
            $dataResponse[] = $row;
        }

        $numRows = mysqli_num_rows($response);

        $data['numRows'] = $numRows;
        $data['dados'] = $dataResponse;
        $data['sql'] = $sql;
        $data['error'] = self::$error;

        return $data;
    }
}
