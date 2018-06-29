<?php 
	include_once("classe/conexao.class.php");
	include_once("classe/autenticar.class.php");

	if($_POST && $_GET["acao"] == "acessar"):
		$email = $_POST["email"];

		$auth = new autenticando();
		$auth->setTabela("usuarios");
		if($auth->esqueceuPassword($email) == 1):
			echo "enviar email";
		else:
			echo "email não enviado";
		endif;

	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Acesso ao CRUD OOP MySQLI - Login</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - MySQLI</h1>
	<form action="esqueceu-senha.php?acao=acessar" method="POST" id="formLogin">
		<label for="email">
			<strong>E-Mail</strong>
			<input type="text" name="email" placeholder="E-Mail" required>
		</label>
		<button type="submit" class="btn-go">Entrar</button>
	</form>
	<div class="bloco-botao">
		<a href="javascript.void(0)" onclick="window.history.back();">Voltar</a>
	</div>
</body>
</html>