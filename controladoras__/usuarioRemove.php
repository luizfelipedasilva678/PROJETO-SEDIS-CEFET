<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/usuarioException.php");
	require_once("../modelo/usuarioDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$usuario = json_decode($_POST['usuario'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"] = "";

	$dao = new UsuarioDAO($conexao);

	try{
		$dao->remove($usuario['id'], $resposta);
	}catch(UsuarioException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
