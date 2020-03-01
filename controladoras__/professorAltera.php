<?php
 	require_once("../modelo/pdoSingleton.php");
	require_once("../modelo/professorException.php");
	require_once("../modelo/professorDao.php");

	$conexao = PDOSingleton::getInstancia()->getConexaoPdo();

	$professorMatriz = json_decode($_POST["professor"],true);

	$professor = new Professor($professorMatriz);

	$resposta["erro"] = false;
	$resposta["mensagem"] = "";

	$dao = new ProfessorDAO($conexao);
	try{
		$dao->altera($professor, $resposta);
	}catch(ProfessorException $e){
		$resposta["erro"] = false;
		$resposta["mensagem"] = $e->getMessage();
	}
	echo json_encode($resposta);

?>
