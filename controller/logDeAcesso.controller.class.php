<?php 

	/**
	*	Descrição do Arquivo Controller para  as ações da tabela log de Acesso
	*	@author - Vanessa Rossi
	*	@Data De Criação - 29/09/2013
	*	@Arquivo  - logDeAcesso.controller.class.php
	*/

include_once "../../functions/crud.class.php";

class LogDeAcessoController extends crud {

	public function __construct(){
		parent::__construct("LogDeAcesso");	
	}

}