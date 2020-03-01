<?php
 	require_once("../modelo/pdoSingleton.php");
 	require_once("../modelo/cursoException.php");
	require_once("../modelo/cursoDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$cursoMatriz = json_decode($_POST["curso"],true);

	$curso = new Curso($cursoMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new CursoDAO($conexao);

	try{
		$dao->altera($curso, $resposta);
	}catch(CursoException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
