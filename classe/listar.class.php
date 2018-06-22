<?php
include_once("conexao.class.php");

class listagem extends conexaoMySQLI{
	public $result;


	/*public function executarQUERY($sql){
		$this->conexao = parent::conectar();
		$this->result = $this->conexao->query($sql);
		return $this->result;
	}*/

	public function listar(){
		return $this->result->fetch_array();
	}
}
?>