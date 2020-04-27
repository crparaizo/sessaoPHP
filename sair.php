<?php
	//Iniciar a sessão
	session_start();
	
	/* Opção 1
	unset($_SESSION['usuario']); //Retira usuário da sessão
	unset($_SESSION['logado']); //Retira flag da sessão
	header("Location: index.php");
	*/
	
	/*Validação - Opção 2
	if($_SESSION['logado'] != "ok"){
		//se não estiver logado
		header("Location: index.php");
	}
	*/
	
	session_destroy();
	header("Location: index.php");
?>