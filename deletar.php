<?php 
	include_once("classe/conexao.class.php");
	include_once("classe/autenticar.class.php");
	include_once("classe/deletar.class.php");

	session_start();

	$auth = new autenticando();
	$auth->acessandoProtect();	

	@$id_deletar = (int) $_GET["id"];

	if(@$_GET["acao"] == "deletar"):
		$deletar = new deletando();
		$deletar->setTabela("usuarios");
		$deletar->setValorNaTabela("id");
		$deletar->setValorNaPesquisa($id_deletar);
		if($deletar->deletar() == 1):
			echo "<div style='width: 800px; background-color: green; display: block; padding: 20px; color: #FFF; font-weight: bold; margin:20px auto; border-radius: 6px; font-family:Arial, sans-serif;'>Usuário deletado com sucesso! <a href='index.php' style='text-decoration:none; background-color:#fff; color:#ccc; padding:5px; border-radius:6px; margin-left:10px;'>VOLTAR</a></div>";
			exit();
		endif;
		
		/*$query = "DELETE FROM usuarios WHERE id={$id_deletar}";
		$conectar = new conexaoMySQLI();
		$conectar->conectar();
		$result = $conectar->executarQUERY($query);
		
		if($result == true):
			echo "<div style='width: 800px; background-color: green; display: block; padding: 20px; color: #FFF; font-weight: bold; margin:20px auto; border-radius: 6px; font-family:Arial, sans-serif;'>Usuário deletado com sucesso! <a href='index.php' style='text-decoration:none; background-color:#fff; color:#ccc; padding:5px; border-radius:6px; margin-left:10px;'>VOLTAR</a></div>";
			exit();
		endif;*/
	endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD - Deletar</title>
	<link rel="stylesheet" href="css/estilo.css?v=<?= time(); ?>">
</head>
<body>
	<h1>CRUD - Deletar</h1>
	<h2>Você deseja realmente deletar esse usuário ?</h2>
	<div class="bloco-botao">
		<a href="deletar.php?acao=deletar&id=<?= $id_deletar; ?>" class="btn-del">Sim</a>
		<a href="index.php" class="btn-add">Não</a>
	</div>	
</body>
</html>