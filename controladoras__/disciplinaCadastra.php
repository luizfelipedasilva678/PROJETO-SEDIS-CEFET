<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/disciplinaException.php");
	require_once("../modelo/disciplinaDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$disciplinaMatriz = json_decode($_POST['disciplina'], true);

	$disciplina = new Disciplina($disciplinaMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new DisciplinaDAO($conexao);
	try{
		$dao->insere($disciplina, $resposta);
	}catch(DisciplinaException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	
	echo json_encode($resposta);
?>