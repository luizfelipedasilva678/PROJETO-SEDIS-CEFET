<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/cidadeException.php");
	require_once("../modelo/cidadeDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$cidade = json_decode($_POST['cidade'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new CidadeDAO($conexao);

	try{
		$dao->obtemPeloId($cidade["id"], $resposta);
	}catch(CidadeException $e){
		$resposta["erro"]=false;
		$resposta["mensagem"]=$e->getMessage();
	}
	echo json_encode($resposta);

?>
