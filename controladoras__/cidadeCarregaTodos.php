<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/cidadeException.php");
	require_once("../modelo/cidadeDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new CidadeDAO($conexao);

	try{
		$dao->listarTodos($resposta);
	}catch(CidadeException $e){
		$resposta["erro"]=false;
		$resposta["mensagem"]=$e->getMessage();
	}
	echo json_encode($resposta);
?>