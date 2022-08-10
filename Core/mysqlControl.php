<?php
require_once 'conexaoDB.php';
require_once '../Controllers/functions.php';


$dadosformulario = $_POST;

foreach ($dadosformulario as $key => $input) {

	$dados = (explode('_', $key));
	$BLOCO          = $dados[1]; //indice de tabelas enviadas
	$ACAO           = $dados[2]; //ação 
	$TABELA[$BLOCO] = $dados[3]; //tabela

	//Tipos de dataType SQL que precisam ser tratados antes do insert ou update
	$tipoDadosIntMysql = ['int', 'decimal', 'bigint', 'mediumint', 'smallint', 'tinyint', 'double'];

	//Pega a Coluna PK;
	if (empty($COLPKTABELA[$BLOCO])) {
		$d = new db();
		$tableColuns = $d->verificarColunasdaTabela($dados[3]);

		foreach ($tableColuns as $k => $value) {

			$datatype[$BLOCO][$value['Field']] = $value['Type'];

			if ($value['Key'] == "PRI") {
				$ColunaPK = $value['Field'];
			}
		}
		$COLPKTABELA[$BLOCO] = $ColunaPK;
	}

	//Pega o valor da coluna Pk enviado por Post;
	if ($ColunaPK == $dados[4]) {
		$IDPKTABELA[$BLOCO] = $input;
	}

	//Trata os dados enviaos e compara com o datatype;
	if (in_array($datatype[$BLOCO][$dados[4]], $tipoDadosIntMysql)) {
		$aspas = "";
		//se o post do campo estiver vazio define null
		empty($input) ? $input = 'null' : '';
	} else {
		$aspas = "'";

		//se o post do campo estiver vazio define null
		if(empty($input)){
			$input = 'null';
			$aspas = "";
		}
	}


	//monta array de inserts com dados enviados por post;
	if ($ACAO == "i") {
		$sql_colunas[$BLOCO] .= $VIRGULA[$BLOCO] . $dados[4];
		$sql_valores[$BLOCO] .= $VIRGULA[$BLOCO] . "'" . addslashes($input) . "'";
		$SQL[$BLOCO] = "insert into " . $TABELA[$BLOCO] . " (" . $sql_colunas[$BLOCO] . ") values (" . $sql_valores[$BLOCO] . ") ";
		$inserir = true;
	}

	//Monta o array com os dados de update enviados por post
	if ($ACAO == "u") {
		$sqlupd_planilha[$BLOCO] = $dados[3];
		$SQLUPDATE[$BLOCO] .= $VIRGULA[$BLOCO] . " " . $dados[4] . "=" . $aspas . addslashes($input) . $aspas . " ";
		$update = true;
	}

	//executa o delete
	if ($ACAO == "d") {
		if (!empty($IDPKTABELA[$BLOCO])) {
			$SQLDELETE = "DELETE FROM " . $dados[3] . " WHERE  " . $COLPKTABELA[$BLOCO] . " = " . addslashes($IDPKTABELA[$BLOCO]) . " ";
			db::runSql($SQLDELETE) or die("Falha ao deletar Cadastro, entre em contato com o admistrador do sistem -  " . $SQLDELETE);
		}
	}

	$VIRGULA[$BLOCO] = ',';
}


if ($inserir) {
	foreach ($SQL as $key => $value) {
		//realiza os inserts com os dados enviados por post
		db::runSql($SQL[$key]) or die("Falha ao criar novo Cadastro, entre em contato com o admistrador do sistem -  " . $SQL[$key]);
		$pegaId = $conn->insert_id;
	}
} else if ($update) {

	foreach ($SQLUPDATE as $key => $value) {
		//verifica se foi enviada chave primaria da row para update
		empty($IDPKTABELA[$key]) ? die('Chave Primaria da tabela ' . $COLPKTABELA[$key] . 'não enviada') : '';

		//faz o update
		$sqlupd = "UPDATE " . $sqlupd_planilha[$key] . " SET " . $SQLUPDATE[$key] . " WHERE " . $COLPKTABELA[$key] . " = " . $IDPKTABELA[$key] . "";
		db::runSql($sqlupd) or die("Falha ao enviar dados, entre em contato com o admistrador do sistem -  " . $SQL[$key]);
	}
}


