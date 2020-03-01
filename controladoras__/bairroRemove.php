<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/bairroException.php");
	require_once("../modelo/bairroDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$bairro = json_decode($_POST['bairro'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"] = "";

	$dao = new BairroDAO($conexao);

	try{
		$dao->remove($bairro['id'], $resposta);
	}catch(BairroException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
