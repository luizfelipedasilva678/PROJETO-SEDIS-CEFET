<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/turmaException.php");
	require_once("../modelo/turmaDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new TurmaDAO($conexao);

	try{
		$dao->listarTodosDT($resposta);
	}catch(TurmaException $e){
		$resposta["erro"]=false;
		$resposta["mensagem"]=$e->getMessage();
	}
	echo json_encode($resposta);
?>
