<?php 

	/**
	*	Descrição do Arquivo
	*	@author - Vanessa Rossi
	*	@Data De Criação - 16/10/2013
	*	@Arquivo  - background.controller.class.php
	*/

include_once "../../functions/crud.class.php";

class BackgroundController extends CRUD {

	public function __construct(){
		parent::__construct("Background");	
	}

}