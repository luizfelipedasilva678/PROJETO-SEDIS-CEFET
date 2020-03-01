<?php
	require_once("configSession.php");
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/usuarioException.php");
	require_once("../modelo/usuarioDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new UsuarioDAO($conexao);
	try{
		$dao->listarTodosDT($resposta);
	}catch(UsuarioException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);
?>