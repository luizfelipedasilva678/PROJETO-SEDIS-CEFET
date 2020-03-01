<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/disciplinaException.php");
	require_once("../modelo/disciplinaDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new DisciplinaDAO($conexao);

	try{
		$dao->listarTodosDT($resposta);
	}catch(DisciplinaException $e){
		$resposta["erro"]=false;
		$resposta["mensagem"]=$e->getMessage();
	}
	echo json_encode($resposta);
?>