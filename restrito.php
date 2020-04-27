<html>
	<head>
		<?php
			session_start(); //Inicia a sessão
			if(!isset($_SESSION['logado']) == true){ //se não exite um dado de usuário / conteudo na sessão
				unset($_SESSION['usuario']); //Retira usuário da sessão
				unset($_SESSION['logado']); //Retira flag da sessão
				header("Location: index.php");
			}
			
			$usuarioLogado = $_SESSION['usuario']; //Variável recebe o nome de usuario q está na sessão
		?>
	</head>
	
	<body>
		<?php
			echo "<h1>Bem vindo $usuarioLogado! </h1>";
			echo "<p> <a href='sair.php'>SAIR</p>";
		?>		
	</body>
</html>