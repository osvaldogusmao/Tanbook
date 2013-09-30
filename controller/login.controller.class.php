<?php 

	/**
	*	Descrição do Arquivo Controller para  as ações do login
	*	@author - Vanessa Rossi
	*	@Data De Criação - 29/09/2013
	*	@Arquivo  - login.controller.class.php
	*/

include_once '../../controller/usuario.controller.class.php';
include_once '../../controller/logDeAcesso.controller.class.php';


class LoginController extends LogDeAcessoController {

	public function __construct(){
	}

	public function login($email , $valueEmail ,$senha , $valueSenha){
		$usuarioController = new UsuarioController();
		 $result = $usuarioController->buscarPorLogin($email , $valueEmail, $senha , $valueSenha );	 
		return $result;
	}

	public function logout(){
		if (isset($_SESSION["id"])) {
			session_destroy();
			header("Location: login.php");
		}
	}

}