<?php
	require_once("configSession.php");
	require_once("../modelo/pdoSingleton.php");
 	require_once("../modelo/alunoException.php");
	require_once("../modelo/alunoDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$aluno = json_decode($_POST['aluno'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new AlunoDAO($conexao);

	$dao->obtemPeloId($aluno["id"], $resposta);

	echo json_encode($resposta);

?>
