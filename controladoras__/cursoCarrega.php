<?php
	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/cursoException.php");
	require_once("../modelo/cursoDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$curso = json_decode($_POST['curso'], true);

	$resposta["erro"]=false;
	$resposta["mensagem"]="";

	$dao = new CursoDAO($conexao);
	try{
		$dao->obtemPeloId($curso["id"], $resposta);
	}catch(CursoException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
