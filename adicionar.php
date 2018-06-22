<?php 
	include_once("classe/conexao.class.php");

	if($_POST && $_GET["acao"] == "adicionar"):
		$nome 		= $_POST["nome"];
		$email 		= $_POST["email"];
		$senha  	= md5($_POST["senha"]);
		$telefone 	= $_POST["telefone"];
		$cpf 		= $_POST["cpf"];
		$endereco 	= $_POST["endereco"];

		$query = "INSERT INTO usuarios (nome, email, senha, telefone, cpf, endereco) VALUES ('$nome','$email','$senha','$telefone','$cpf','$endereco')"; 
		$conectar = new conexaoMySQLI();
		$conectar->conectar();
		$result = $conectar->executarQUERY($query);

		if($result === true):
			echo "<div class='msg-sucesso'>Dados cadastrado com sucesso! <a href='index.php' class='btn-back'>VOLTAR</a></div>";
		else:
			var_dump($result);
		endif;
	endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Adicionar</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - OOP MySQLI - Adicionar</h1>
	<form action="adicionar.php?acao=adicionar" method="POST" id="formAdd">
		<label for="nome">
			<strong>Nome</strong>
			<input type="text" name="nome" placeholder="Digite o Nome" required>
		</label>
		<label for="email">
			<strong>E-Mail</strong>
			<input type="email" name="email" placeholder="Digite o E-mail" required>
		</label>
		<label for="senha">
			<strong>Senha</strong>
			<input type="password" name="senha" placeholder="Digite a Senha" required>
		</label>
		<label for="telefone">
			<strong>Telefone</strong>
			<input type="phone" name="telefone" placeholder="Digite o Telefone" required>
		</label>
		<label for="cpf">
			<strong>CPF</strong>
			<input type="text" name="cpf" placeholder="Digite o CPF" required>
		</label>
		<label for="endereco">
			<strong>Endereço</strong>
			<input type="text" name="endereco" placeholder="Digite o Endereço" required>
		</label>
		<div class="bloco-botao">
			<button type="submit" class="btn-add">Enviar</button>
		</div>
	</form>	
</body>
</html>