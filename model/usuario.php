<?php

class usuario {

	//atributos
	private $codigo;
	private $nome_completo;
	private $email;
	private $sexo;
	private $login
	private $senha;
	private $data_nascimento;
	private $url_facebook;
	private $apelido;
	private $avatar;
	private $tipo_usuario;

	//metodo construtor
public function __construct(){
		parent::__construct();
	}

	// getters 
	public function getCodigo(){
		return $this->codigo;
	}
	 public function getNomeCompleto(){
    		return $this->nome_completo;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getSexo(){
		return $this->sexo;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getDataNascimento(){
		return $this->data_nascimento;
	}
	public function getUrlFacebook(){
		return $this->url_facebook;
	}
	public function getApelido(){
		return $this->apelido;
	}
	public function getAvatar(){
		return $this->avatar;
	}
	public function getTipousuario(){
		return$this->tipo_usuario;
	}

	//setters
	public function setCodigo($codigo){
    		$this->codigo = $codigo;
	}
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}

		public function setUsuarioComCodigo($codigo , $nome_completo , $email , $sexo , $login , $senha , $data_nascimento , $url_facebook , $apelido , $tipo_usuario){
		$this->codigo = $codigo;
		$this->nome_completo = $nome_completo;
		$this->email = $email;
		$this->sexo = $sexo;
		$this->login = $login;
		$this->senha = $senha;
		$this->data_nascimento = $data_nascimento;
		$this->url_facebook = $url_facebook;
		$this->apelido = $apelido;
		$this->tipo_usuario = $tipo_usuario;
	}

		public function setUsuarioSemCodigo( $nome_completo , $email , $sexo , $login , $senha , $data_nascimento , $url_facebook , $apelido , $tipo_usuario){
		$this->nome_completo = $nome_completo;
		$this->email = $email;
		$this->sexo = $sexo;
		$this->login = $login;
		$this->senha = $senha;
		$this->data_nascimento = $data_nascimento;
		$this->url_facebook = $url_facebook;
		$this->apelido = $apelido;
		$this->tipo_usuario = $tipo_usuario;
	}

}
?>
