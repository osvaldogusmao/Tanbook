<?php 

/**
*	Descrição do Arquivo Usuario controller
*	@author - Vanessa Rossi
*	@Data De Criação - 29/09/2013
*	@Arquivo  - usuario.controller.class.php
*/
include_once "../../functions/crud.class.php";


class UsuarioController extends crud {

	public function __construct(){
		parent::__construct("Usuario");
	}

	public function buscarPorLogin($email , $valueEmail ,$senha , $valueSenha){
		return $this->execute_query("SELECT * FROM " . $this->getTabela() ." WHERE ".$email."='". $valueEmail."' and ".$senha. " = '" .$valueSenha." ';" );
	}
}