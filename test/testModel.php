<?php 

class Teste {

	//Os nomes dos atributos devem ser iguais aos nomes da tabela no banco de dados.
	private $id;
	private $nome;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

}
