<?php 

include_once 'test.crud.php';


class teste {

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


// Criando uma instância da classe "test" que foi estendida da classe "crud".
$crud_test = new test("teste");


//Criando uma instância da classe teste e setado valores
$teste = new teste;
$teste->setId(10);
$teste->setNome("Classe de teste");


//Executando os métodos da classe crud

//métodos herdados da classe crud
$crud_test->save($teste);
$crud_test->update($teste, 'id');
$crud_test->remove($teste->getId(), 'id');

//métodos da classe test
$crud_test->lista();
