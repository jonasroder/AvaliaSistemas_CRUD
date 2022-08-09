<?php
require_once 'conexaoDB.php';

ini_set("display_errors", false);
ini_set( 'default_charset', 'UTF-8');


$dadosformulario = $_POST;
$_GET['_id'] ? $pegaId = addslashes($_GET['_id']):null;
$_GET['_tabela'] ? $pkTabela = 'id'.addslashes($_GET['_tabela']):null;


foreach ($dadosformulario as $key => $input) {

	$dados = (explode('_', $key));
	$BLOCO          = $dados[1];
	$ACAO           = $dados[2];
	$TABELA[$BLOCO] = $dados[3];

	if ($ACAO == "i") {
		@$sql_colunas[$BLOCO] .= $VIRGULA[$BLOCO] . $dados[4];
		@$sql_valores[$BLOCO] .= $VIRGULA[$BLOCO] . "'" . addslashes($input) . "'";
		$SQL[$BLOCO] = "insert into " . $TABELA[$BLOCO] . " (" . $sql_colunas[$BLOCO] . ") values (" . $sql_valores[$BLOCO] . ") ";
		$inserir = true;
	}

	if ($ACAO == "u") {
		@$sqlupd_planilha[$BLOCO] = $dados[3];
		$SQLUPDATE[$BLOCO] .= $VIRGULA[$BLOCO]." ".$dados[4] . "='" . addslashes($input) ."'";
		$update=true;		
	}

	if ($ACAO == "d") {
		$SQLDELETE = "DELETE FROM " . $dados[3] . " WHERE  " . $pkTabela . " = " . addslashes($input) . " ";
		db::runSql($SQLDELETE) or die ("Falha ao deletar Cadastro, entre em contato com o admistrador do sistem - ".mysqli_error($conn)." - ".$SQLDELETE);
	}
	$VIRGULA[$BLOCO] = ',';
}


if ($inserir) {
	foreach ($SQL as $key => $value) {
		db::runSql($SQL[$key]) or die ("Falha ao criar novo Cadastro, entre em contato com o admistrador do sistem - ".mysqli_error($conn)." - ".$SQL[$key]);	
		$pegaId = $conn->insert_id;
	}
} else if($update){
	foreach ($SQLUPDATE as $key => $value) {
		$sqlupd="UPDATE ".$sqlupd_planilha[$key]." SET ".$SQLUPDATE[$key]." WHERE " . $pkTabela . " = " . $pegaId . "";
		db::runSql($sqlupd) or die ("Falha ao enviar dados, entre em contato com o admistrador do sistem - ".mysqli_error($conn)." - ".$SQL[$key]);	
	}
}



//Faz Upload da Imagem
if (!empty($_FILES)) {
	$file_extension = explode('/', $_FILES['img']['type']);
	$file_extension = strtolower(end($file_extension));
	$accepted_formate = array('jpeg', 'jpg', 'png');

	if (in_array($file_extension, $accepted_formate)) {
		echo "This is jpeg/jpg/png file";

	} else {
		echo $file_extension . 'Formato de imagem não suportado!!';
	}
};


 unset($inserir);
 unset($update);
 unset($_POST);
 unset($_FILES);
