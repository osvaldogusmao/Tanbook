<?php 

/*
	Descrição do arquivo
	@autor - Ivan Simionato
	@data de criação - 22/09/2013
	@arquivo - logdeacesso.class.php

*/


class LogDeAcesso{

	private $id;
	private $usuario_id;
	private $dataAcesso;

	public function getId(){
	    return $this->id;
	}
	 
	public function setId($id){
		$this->id = $id;
	}

	public function getUsuario_id(){
		return $this->usuario_id;
	}

	public function setUsuario_id($usuario_id){
		$this->usuario_id = $usuario_id;
	}

	public function getDataAcesso(){
	    return $this->dataAcesso;
	}
	 
	public function setDataAcesso($dataAcesso){
		$this->dataAcesso = $dataAcesso;
	}

}