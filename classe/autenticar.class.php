<?php
include_once("conexao.class.php");

class autenticando extends conexaoMySQLI{
	public $tabela;
	#public $valorNaTabela;
	public $query;


	public function setTabela($tabela){
		$this->tabela = $tabela;
	}

	/*public function setValorNaTabela($campos){
		$this->valorNaTabela = $campos;
	}*/


	//verificando o acesso
	public function acessandoAuth($email,$senha){
		$this->query = "SELECT * FROM $this->tabela WHERE email='$email' AND senha='$senha'";
		$result = parent::executarQUERY($this->query);
		if($result->num_rows == 1):
			session_start();

			$_SESSION["email"] = $email;
			$_SESSION["senha"] = $senha;

			return 1;
		else:
			session_destroy();

			unset($_SESSION["email"],$_SESSION["senha"]);

			return 0;
		endif;
	}


	//fazendo o protect ou proteção de acesso a página
	public function acessandoProtect(){

		if(!isset($_SESSION["email"]) && !isset($_SESSION["senha"])):
			session_destroy();

			unset($_SESSION["email"],$_SESSION["senha"]);
			header("Location: login.php");
		endif;
	}

	//fazer logout


	//esqueceu a senha?
	public function esqueceuPassword($email){
		$this->query = "SELECT * FROM $this->tabela WHERE email='$email'";
		$result = parent::executarQUERY($this->query);
		if($result->num_rows == 1):
			return 1;
		else:
			return 0;
		endif;
	}
}
?>