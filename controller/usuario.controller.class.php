<?php 
/**
*	Descrição do Arquivo Usuario controller
*	@author - Vanessa Rossi
*	@Data De Criação - 29/09/2013
*	@Arquivo  - usuario.controller.class.php
*/
include_once "../../functions/crud.class.php";
class UsuarioController extends CRUD {

	public function __construct(){
		parent::__construct("Usuario");
	}

	public function buscarPorLogin($email , $valueEmail ,$senha , $valueSenha){
		return $this->execute_query("SELECT * FROM " . $this->getTabela() ." WHERE ".$email."='". $valueEmail."' and ".$senha. " = '" .$valueSenha." ';" );
	}
	
<<<<<<< HEAD
	public function verificaSessao(){
		  session_start();
		  if (!isset($_SESSION['id'])) {
	   	 header("Location: ../login/login.php");
	  	}
	}

}
	/*
	  Descrição do arquivo: Controller responsavel pelas consultas para listagem de usuarios na tela lista.php
	  @autor - Lukas Roberto
	  @data de criação - 07/09/2013
	  @
	 */



	class usuarioControl extends crud{
		  
		// Método construtor
		public function __construct(){
			parent::__construct("Usuario");
		}
	  		
		// Método de listagem
		public function listarUsuario($where = NULL){	
//			verificaSessao();
			if ($where){
				$select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id and usuario.id =".$where);
			}else{
				$select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id");
		  	}
			
			$regs = mysql_num_rows($select);
			
			//Verifica se tem usuarios cadastrados no BD, se tiver retorna uma lista com os usuarios
		  	if ($regs > 0){
				return $select;
			
			//se nao tiver usuarios cadastrados retorna false
			}else{
				return false;
=======
	public function listarUsuario($where = NULL){	
		if ($where){
			$select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id and usuario.id =".$where);
		}else{
			$select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id");
		  }
		$regs = mysql_num_rows($select);
		  if ($regs > 0){
			return $select;
		}else{
			return false;
>>>>>>> 45b6cf066237d9dd15d48f4e26b4df3d5065a4ff
			}
		}
			public function tipoUsuario($where){
				return $select = $this->execute_query("SELECT * FROM tipodeusuario WHERE id =".$where);
		}  	
	}  		
?>
