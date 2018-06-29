<?php 
include_once("conexao.class.php");

class deletando extends conexaoMySQLI{
	public $tabela;
	public $valorNaTabela;
	public $valorNaPesquisa;
	public $query;


	public function setTabela($tabela){
		$this->tabela = $tabela;
	}

	public function setValorNaTabela($valor){
		$this->valorNaTabela = $valor;
	}

	public function setValorNaPesquisa($pesquisa){
		$this->valorNaPesquisa = $pesquisa;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function deletar(){
		$this->query = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = {$this->valorNaPesquisa}";
		if(parent::executarQUERY($this->query)):
			return 1;
		endif;
	}

}
?>