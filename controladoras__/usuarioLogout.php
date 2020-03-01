<?php  
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/usuarioException.php");
	require_once("../modelo/usuarioDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();	

	$cookie = json_decode($_POST['cookie'], true);
	
	$idSessao = $cookie["id"];


	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new UsuarioDAO($conexao);

	try{
		$dao->logoutUsuario($idSessao,$resposta);
	}catch(UsuarioException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);
?>