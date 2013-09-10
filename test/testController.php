<?php 

include_once '../functions/crud.class.php';

/**
*
* Classe para testar a implentação do crud genérico
*
*/

class Test extends crud {

	public function __construct(){
		//Deve obrigatoriamente passar um parametro, que deve ser o mesmo nome da tabela no BD
		parent::__construct("teste");
	}

	public function lista(){
		echo "select * from " . $this->getTabela() .  " ; <br/>";
	}

}
