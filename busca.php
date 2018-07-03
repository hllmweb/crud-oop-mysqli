<?php
	include_once("classe/conexao.class.php");
	include_once("classe/autenticar.class.php");
	include_once("classe/listar.class.php");
	include_once("classe/busca.class.php");

	session_start();

	$auth = new autenticando();
	$auth->acessandoProtect();

	$txt_busca = $_POST["busca"];

	$busca = new buscando();
	$busca->setTabela("usuarios");
	$busca->setValorNaTabela("nome");
	$busca->setValorNaPesquisa($txt_busca);
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Busca</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<?= $_SESSION["email"]; ?>
	<a href="sair.php">Sair</a>
	
	<form action="busca.php" method="POST" id="formSearch">
		<input type="text" name="busca" placeholder="Pesquisar..."> 
		<button type="submit">Buscar</button>
	</form>
	<a href="index.php">Início</a>
	
	<h1>CRUD</h1>
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
				$dadosBusca = $busca->pesquisaListagem();
				/*echo "<pre>";
				print_r($dadosBusca);
				echo "</pre>";*/
				if($dadosBusca > 0):	
					foreach($dadosBusca as $row):
			?>					
			<tr>
				<td><?= $row['id']; ?></td>
				<td><?= utf8_encode($row['nome']); ?></td>
				<td><?= $row['email']; ?></td>
				<td><?= $row['cpf']; ?></td>
				<td>
					<a href="editar.php?id=<?= $row["id"]; ?>" class="btn-edit">Editar</a>
					<a href="deletar.php?id=<?= $row["id"]; ?>" class="btn-del">Deletar</a>
				</td>
			</tr>
			<?php 
					endforeach;
				else:
			?>
			<tr>
				<td colspan="5">Essa informação não existe no banco de dados :(</td>
			</tr>
			<?php 
				endif;
			?>
		
		</tbody>
	</table>

</body>
</html>