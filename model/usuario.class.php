<?php

/**
*	Descrição do Arquivo
*	@author - Vanessa Rossi
*	@Data De Criação - 07/09/2013
*	@Arquivo  - usuario.class.php
*/

include_once "usuario.controller.class.php"; //include inserido para testes Lukas Roberto

class usuario   { 

	//atributos
	
	private $id;
	private $nome;
	private $email;
	private $sexo;
	private $senha;
	private $dataDeNascimento;
	private $urlFacebook;
	private $apelido;
	private $avatar;
	private $dataDeCadastro;
	private $tipoDeUsuario_id;
	private $grupoDeUsuario_id;

	//metodo construtor
public function __construct(){
		//parent::__construct();
	}

//getters e setters

	public function getId(){
	    return $this->id;
	}
	 
	public function setId($id){
	    return $this->id = $id;
	}

	public function getNome(){
	    return $this->nome;
	}
	 
	public function setNome($nome){
	    return $this->nome = $nome;
	}

	public function getEmail(){
	    return $this->email;
	}
	 
	public function setEmail($email){
	    return $this->email = $email;
	}

	public function getSexo(){
	    return $this->sexo;
	}
	 
	public function setSexo($sexo){
	    return $this->sexo = $sexo;
	}

	public function getSenha(){
	    return $this->senha;
	}
	 
	public function setSenha($senha){
	    return $this->senha = $senha;
	}

	public function getDataDeNascimento(){
	    return $this->dataDeNascimento;
	}
	 
	public function setDataDeNascimento($dataDeNascimento){
	    return $this->dataDeNascimento = $dataDeNascimento;
	}

	public function getUrlFacebook(){
	    return $this->urlFacebook;
	}
	 
	public function setUrlFacebook($urlFacebook){
	    return $this->urlFacebook = $urlFacebook;
	}

	public function getApelido(){
	    return $this->apelido;
	}
	 
	public function setApelido($apelido){
	    return $this->apelido = $apelido;
	}

	public function getAvatar(){
	    return $this->avatar;
	}
	 
	public function setAvatar($avatar){
	    return $this->avatar = $avatar;
	}

	public function getDataDeCadastro(){
	    return $this->dataDeCadastro;
	}
	 
	public function setDataDeCadastro($dataDeCadastro){
	    return $this->dataDeCadastro = $dataDeCadastro;
	}

	public function getTipoUsuario_id(){
	    return $this->tipoUsuario_id;
	}
	 
	public function setTipoDeUsuario_id($tipoDeUsuario_id){
	    return $this->tipoDeUsuario_id = $tipoDeUsuario_id;
	}

	public function getGrupoDeUsuario_id(){
	    return $this->grupoDeUsuario_id;
	}
	 
	public function setGrupoDeUsuario_id($grupoDeUsuario_id){
	    return $this->grupoDeUsuario_id = $grupoDeUsuario_id;
	}
?>
