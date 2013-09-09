<?php

include_once "../functions/crud.class.php";

class usuarioControl extends crud{
	  
	//Atributos
	
	private $sql_select = "";


	// Método construtor
	
	public function __construct(){
		parent::__construct();
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
		
			// Início
			
			$estrutura = "<table><tr><th>Código</th><th>Nome</th><th>Login</th><th>Senha</th><th>E-mail</th><th>Nick Name</th><th>Facebook</th><th>Data de Nascimento</th><th>Editar</th><th>Excluir</th></tr>";
			
    		while($campo = mysql_fetch_array($sel)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                    $estrutura .= 	"
									<tr>
										<td>".$campo['codigo']."</td>
										<td>".$campo['nome']."</td>
										<td>".$campo['login']."</td>
										<td>".$campo['senha']."</td>
										<td>".$campo['email']."</td>
										<td>".$campo['nick name']."</td>
										<td>".$campo['facebook']."</td>
										<td>".$campo['datanascimento']."</td>
										<td><a href=\"editarusuario.php?codigo=".$campo['codigo']."\" class='tbListaUsuario'\">Editar</a></td>
										<td><a href=\"excluirusuario.php?codigo=".$campo['codigo']."\" class='tbListaUsuario'\" >Excluir</a></td>
									</tr>
									";
			}
			
			$estrutura .= "</table>";
			
			// Fim
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}

	}  	

}  		
  	
?>