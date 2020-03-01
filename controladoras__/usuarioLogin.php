<?php  
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/usuarioException.php");
	require_once("../modelo/usuarioDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$dadosLogin = json_decode($_POST['dadosLogin'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new UsuarioDAO($conexao);

	try{
		$dao->loginUsuario($dadosLogin, $resposta);
	}catch(UsuarioException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);
?>