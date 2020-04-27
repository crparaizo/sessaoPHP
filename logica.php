<?php
	//Iniciar a sessão
	session_start();
	
	//Login e senha: essas variáveis recebem os dados digitados
	$login = $_POST["usuario"];
	$senha = $_POST["senha"];
	
	//Realizar a conexão  com o DB - pode ser feito em um arquivo externo
	//nome/endereço do servidor ; usuário q faz conexão com esse banco ; senha do usuário ou para acesso da base; nome da base
	$mysqli = new mysqli("localhost", "root", "", "lojavirtual");
	
	mysqli_set_charset($mysqli,"utf8"); //reconhecer acentos, aplicado diretamente no dado que vem do banco
	
	//Realizas consulta no DB, procurar usuário e senha
	if($resultado = $mysqli -> query ("SELECT * FROM tbpessoa WHERE nome = '$login' AND senha = '$senha'")) {
		$qtd_linhas = $resultado -> num_rows; //Mostra a quant de linhas quem vem do resultado
		$resultado -> close(); //Fecha conexão com o DB
		
		//Se q quant de linhas for maior q zero, o usuario existe, ou seja, pesquisa restornou algo
		if($qtd_linhas > 0){
			$_SESSION['usuario'] = $login; //Coloca o nome do usuário na sessão
			$_SESSION['logado'] = "ok"; //Flag para verificar se está logado ou ñ
			header("Location: restrito.php"); //Envia restrito.php 
		} else {
			unset($_SESSION['usuario']); //Retira usuário da sessão
			unset($_SESSION['logado']); //Retira flag da sessão
			header("Location: index.php"); //Devolve o usuário para a página inicial
		}
	}
?>