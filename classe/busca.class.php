<?php
include_once("conexao.class.php");

class buscando extends conexaoMySQLI{
	public $tabela;
	public $valorNaTabela;
	public $valorNaPesquisa;
	public $query;


	public function setTabela($tabela){
		$this->tabela = $tabela;
	}	

	public function setValorNaTabela($id){
		$this->valorNaTabela = $id;
	}

	public function setValorNaPesquisa($valor){
		$this->valorNaPesquisa = $valor;
	}

	public function pesquisaListagem(){
		$this->query = "SELECT * FROM $this->tabela WHERE $this->valorNaTabela LIKE '%$this->valorNaPesquisa%'";
		$result = parent::executarQUERY($this->query);
		if($result->num_rows > 0):	
			return $result->fetch_all(MYSQLI_ASSOC);
		endif;
	}
}

?>