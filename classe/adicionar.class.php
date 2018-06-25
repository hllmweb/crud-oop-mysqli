<?php
include_once("conexao.class.php");

class adicionando extends conexaoMySQLI{
	public $tabela;
	public $campos;
	public $valor;
	public $msg;
	public $query;

	public function setTabela($tabela){
		$this->tabela = $tabela;
	}

	public function setCampos($campos){
		$this->campos = $campos;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getMsg(){
		return $this->msg;
	}

	public function inserindo(){
		$this->query = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->valor)";
		if(parent::executarQUERY($this->query)):
			return 1;
		else:
			return 0;
		endif;
	}

}
?>