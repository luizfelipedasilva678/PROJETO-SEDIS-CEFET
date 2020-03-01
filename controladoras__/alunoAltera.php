<?php
	require_once("configSession.php");
 	require_once("../modelo/pdoSingleton.php");
 	require_once("../modelo/alunoException.php");
	require_once("../modelo/alunoDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$alunoMatriz = json_decode($_POST["aluno"],true);

	$aluno = new Aluno($alunoMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new AlunoDAO($conexao);

	$dao->altera($aluno, $resposta);

	echo json_encode($resposta);

?>
