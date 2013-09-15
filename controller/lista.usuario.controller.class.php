<?php

include_once "../functions/crud.class.php";
include_once "../functions/connection.class.php";


class usuarioControl extends crud{
	  
	// Método construtor
	
	public function __construct(){
		parent::__construct("usuario");
	}
  		
	// Método de listagem

	public function listarUsuario($where = NULL){	
		
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where;
		}else{
			$this->sql_select = "SELECT * FROM ".$this->getTabela();
	  	}

	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);
		
	  	if ($regs > 0){
		return $sel;

		}else{
			return "Nenhum registro encontrado!";
		}

	}  	

}  		
  	
?>