<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/turmaException.php");
	require_once("../modelo/turmaDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$turma = json_decode($_POST['turma'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new TurmaDAO($conexao);
	try{
		$dao->obtemPeloId($turma["id"], $resposta);
	}catch(TurmaException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>