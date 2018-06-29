<?php
	include_once("classe/conexao.class.php");
	include_once("classe/autenticar.class.php");
	include_once("classe/listar.class.php");

	session_start();

	$auth = new autenticando();
	$auth->acessandoProtect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD OOP MySQLI</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
<?php	
	$conectar = new conexaoMySQLI();
	$conectar->conectar(); //mensagem do conectado foi cortada
	echo $conectar->getMsg(); //getmsg não tá retornando pq tirei a condição do conectar
	echo "<br>----------------<br>";
	
	

	$listagem = new listagem();
	$listagem->executarQUERY("SELECT * FROM usuarios");

	/*while($row = $listagem->listar()){
		echo "<br>".utf8_encode($row["nome"]);
	}*/


	/*$result = $conectar->executarQUERY($sql);



	while($row = $result->fetch_array()){
		echo "<br>".utf8_encode($row["nome"]);
	}



	foreach($result as $row){
		echo "<br>".utf8_encode($row["nome"]);
	}*/
?>
	<?= $_SESSION["email"]; ?>
	<a href="sair.php">Sair</a>

	<h1>CRUD - OOP MySQLI</h1>
	<div class="bloco-botao">
		<a href="adicionar.php" class="btn-add">Adicionar</a>
	</div>
	<table id="tabela">
		<thead>
			<tr>
				<th><strong>ID</strong></th>
				<th><strong>NOME</strong></th>
				<th><strong>E-MAIL</strong></th>
				<th><strong>CPF</strong></th>
				<th><strong>AÇÃO</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php
				while($row = $listagem->listar()):
			?>
			<tr>
				<td><?= $row["id"]; ?></td>
				<td><?= utf8_encode($row["nome"]); ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["cpf"]; ?></td>
				<td>
					<a href="editar.php?id=<?= $row["id"]; ?>" class="btn-edit">Editar</a>
					<a href="deletar.php?id=<?= $row["id"]; ?>" class="btn-del">Deletar</a>
				</td>
			</tr>
			<?php 
				endwhile;
			?>
		</tbody>
	</table>

</body>
</html>