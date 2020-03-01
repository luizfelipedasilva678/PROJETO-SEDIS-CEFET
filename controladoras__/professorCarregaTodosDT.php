<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/professorException.php");
	require_once("../modelo/professorDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new ProfessorDAO($conexao);
	try{
		$dao->listarTodosDT($resposta);
	}catch(ProfessorException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);
?>
