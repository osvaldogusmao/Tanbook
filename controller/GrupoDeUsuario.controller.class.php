<?php

/*

  Controlador da classe GrupoDeUsuario- (controlar o CRUD do GrupoDeUsuario)

  @author Rafael Freitas

  @date 17/09/2013 – Data da criação do arquivo

  @nameFile GrupoDeUsuarioController.class.php (GrupoDeUsuarioController)

*/

include_once "../../functions/crud.class.php";

class GrupoDeUsuarioController extends CRUD{
	  
	//Atributos
	
	private $sql_select = "";


	// Método construtor
	
	public function __construct(){
		parent::__construct("GrupoDeUsuario");
	}
  		

	// Método de listagem

	public function listarGrupoDeUsuario($where = NULL){
		
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where;
		}else{
			$this->sql_select = "SELECT * FROM ".$this->getTabela();
	  	}
		
		$con = new Connection();
		$con->openConnection();

	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);

		
		
	  	if ($regs > 0){
		
			// Início
			
			$estrutura = "<table><tr><th>Código</th><th>Nome</th><th>Apelido</th><th>Quantidade de Licensa</th><th>Validade de Licensa</th><th>Chave da Licensa</th><th>Status</th><th>Data de Cadastro</th><th>Editar</th><th>Excluir</th></tr>";
			
    		while($campo = mysql_fetch_array($sel)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                    $estrutura .= 	"
									<tr>
										<td>".$campo['id']."</td>
										<td>".$campo['nome']."</td>
										<td>".$campo['apelido']."</td>
										<td>".$campo['quantidadeDeLicensa']."</td>
										<td>".$campo['validadeDaLicensa']."</td>
										<td>".$campo['chaveDaLicensa']."</td>
										<td>".$campo['status']."</td>
										<td>".$campo['dataDeCadastro']."</td>
										<td><a href=\"\" class='tbListaUsuario'\">Editar</a></td>
										<td><a href=\"\" class='tbListaUsuario'\" >Excluir</a></td>
									</tr>
									";
			}
			
			$estrutura .= "</table>";
			$con->closeConnection();
			// Fim
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}


	}  	

}  		
  	
?>