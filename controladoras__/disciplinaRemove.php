<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/disciplinaException.php");
	require_once("../modelo/disciplinaDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$disciplina = json_decode($_POST['disciplina'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"] = "";

	$dao = new DisciplinaDAO($conexao);

	try{
		$dao->remove($disciplina['id'], $resposta);
	}catch(DisciplinaException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>