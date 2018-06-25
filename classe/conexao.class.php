<?php
/*
	Fazendo conexão com o banco de dados.
	Utilizando MySQLI para conexão
*/

class conexaoMySQLI{
	public $servidor;
	public $usuarioBD;
	public $senhaBD;
	public $hostDB;
	public $msg;
	public $conexao;
	public $result;
	public $dados;
	public $query;

	public function __construct(){
		$this->servidor 	= "localhost";
		$this->usuarioBD 	= "root";
		$this->senhaBD 		= "";
		$this->hostDB 		= "crud_mysqli";
	}

	public function getMsg(){
		return $this->msg;
	}

	public function conectar(){	
		$this->conexao = new mysqli($this->servidor,$this->usuarioBD,$this->senhaBD,$this->hostDB);
		/*if($this->conexao):
			$this->msg = "Conectado com sucesso";
		endif;
		*/

		return $this->conexao;
	}



	public function executarQUERY($sql){
		//return $this->result->fetch_array();
		#$this->dados = parent::executarQUERY($qry);
		//return $this->result->fetch_array();
		$this->conexao = self::conectar();
		$this->result = $this->conexao->query($sql);
		return $this->result;
	}


	/*public function ok($sql){
		return $this->conexao->query($sql);
	}*/

}

?>