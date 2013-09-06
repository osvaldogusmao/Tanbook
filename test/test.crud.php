<?php 

include_once '../functions/crud.class.php';

/**
*
* Classe para testar a implentação do crud genérico
*
*/

class test extends crud {

	public function __construct($tabela){
		parent::__construct($tabela);
	}

	public function lista(){
		echo "select * from " . $this->getTabela() .  " ; <br/>";
	}

}