<?php
 	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/usuarioException.php");
	require_once("../modelo/usuarioDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$usuarioMatriz = json_decode($_POST["usuario"],true);

	$usuario = new Usuario($usuarioMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new UsuarioDAO($conexao);

	try{
		$dao->altera($usuario, $resposta);
	}catch(UsuarioException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
