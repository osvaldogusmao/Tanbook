<?php 

/*
	Descrição do arquivo
	@autor - Ivan Simionato
	@data de criação - 22/09/2013
	@arquivo - historia.class.php

*/
	 
class Historia {

 	private $id;
 	private $nome;
 	private $resenha;
 	private $autor;
 	private $dataCriacao;
 	private $dataPublicacao;
 	private $status;
 	private $grupoDeUsuario_id;
 	private $compartilhada;
 	private $fotoCapa;

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

	public function getResenha(){
    	return $this->resenha;
	}
 
	public function setResenha($resenha){
    	$this->resenha = $resenha;
	}

	public function getAutor(){
    	return $this->autor;
	}
 
	public function setAutor($autor){
    	$this->autor = $autor;
	}

	public function getDataCriacao(){
    	return $this->dataCriacao;
	}
 
	public function setDataCriacao($dataCriacao){
    	$this->dataCriacao = $dataCriacao;
	}

	public function getDataPublicacao(){
    	return $this->dataPublicacao;
	}
 
	public function setDataPublicacao($dataPublicacao){
    	$this->dataPublicacao = $dataPublicacao;
	}

	public function getStatus(){
    	return $this->status;
	}
 
	public function setStatus($status){
    	$this->status = $status;
	}

	public function getGrupoDeUsuario_id(){
    	return $this->grupoDeUsuario_id;
	}
 
	public function setGrupoDeUsuario_id($grupoDeUsuario_id){
    	$this->grupoDeUsuario_id = $grupoDeUsuario_id;
	}

	public function getCompartilhada(){
    	return $this->compartilhada;
	}
 
	public function setCompartilhada($compartilhada){
    	$this->compartilhada = $compartilhada;
	}

	public function getFotoCapa(){
    	return $this->fotoCapa;
	}
 
	public function setFotoCapa($fotoCapa){
    	$this->fotoCapa = $fotoCapa;
	}
}