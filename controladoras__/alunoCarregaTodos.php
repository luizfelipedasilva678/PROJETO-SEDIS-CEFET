<?php
	require_once("configSession.php");
	require_once("../modelo/pdoSingleton.php");
 	require_once("../modelo/alunoException.php");
	require_once("../modelo/alunoDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new AlunoDAO($conexao);

	$dao->listarTodos($resposta);

	echo json_encode($resposta);
?>
