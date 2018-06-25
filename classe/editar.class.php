<?php 
include_once("conexao.class.php");

class editando extends conexaoMySQLI{
	public $tabela;
	public $campos;
	public $valorNaPesquisa;
	public $valorNaTabela;
	public $msg;
	public $query;

	public function setTabela($tabela){
		$this->tabela = $tabela;
	}

	public function setCampos($campos){
		$this->campos = $campos;
	}

	public function setValorNaPesquisa($pesquisa){
		$this->valorNaPesquisa = $pesquisa;
	}

	public function setValorNaTabela($valor){
		$this->valorNaTabela = $valor;
	}

	public function getMsg(){
		return $this->msg;
	}

	public function atualizando(){
		$this->query = "UPDATE $this->tabela SET $this->campos WHERE $this->valorNaTabela = {$this->valorNaPesquisa}";
		if(parent::executarQUERY($this->query)):
			//$this->msg = "Atualizado com sucesso";
			return 1;
		endif;
	}

}
?>