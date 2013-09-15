<?php

include_once "../../functions/crud.class.php";
include_once "../../functions/connection.class.php";

class usuarioControl extends crud{
	  
	// Método construtor
	public function __construct(){
		parent::__construct("usuario");
	}
  		
	// Método de listagem
	public function listarUsuario($where = NULL){	
		
		if ($where){
			$select = $this->execute_query("SELECT * FROM ".$this->getTabela()." WHERE ".$where);
		}else{
			$select = $this->execute_query("SELECT * FROM ".$this->getTabela());
	  	}
		
		$regs = mysql_num_rows($select);
		
		//Verifica se tem usuarios cadastrados no BD, se tiver retorna uma lista com os usuarios
	  	if ($regs > 0){
			return $select;
		
		//se nao tiver usuarios cadastrados retorna false
		}else{
			return false;
		}

	}  	

}  		
  	
?>