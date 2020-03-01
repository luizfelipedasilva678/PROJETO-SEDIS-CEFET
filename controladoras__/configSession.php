<?php
session_start();
//var_dump($_COOKIE);
if ( !isset($_SESSION['loginSedis']) ) {
    //echo "expirou";
    header('Location: ../visualizacao/tela-login.html');
   // die();
}else{
	if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 20)) {

    	// última atividade foi mais de 60 minutos atrás
    	session_unset();     // unset $_SESSION  
   	 	session_destroy();   // destroindo session data 
	}
	$_SESSION['ultima_atividade'] = time(); // update da ultima atividade
	//echo "valida";
}
?>