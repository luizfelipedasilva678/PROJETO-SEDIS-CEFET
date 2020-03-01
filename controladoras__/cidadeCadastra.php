<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/cidadeException.php");
	require_once("../modelo/cidadeDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$cidadeMatriz = json_decode($_POST['cidade'], true);

	$cidade = new Cidade($cidadeMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new CidadeDAO($conexao);
	try{
		$dao->insere($cidade, $resposta);
	}catch(CidadeException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}

	echo json_encode($resposta);
?>
