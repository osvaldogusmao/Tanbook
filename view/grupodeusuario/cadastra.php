<?php

include_once "../../functions/connection.class.php";
include_once "../../controller/GrupoDeUsuario.controller.class.php";
	session_start();
	if (!isset($_SESSION['id'])) {
		 header("Location: ../../view/login/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projeto Tanbook</title>
	<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>
<body> 

<section id="wrapper">
<header>
LOGO AQUI
</header>
<nav>MENU</nav>
<section id="conteudo"> 
<?php


$con = new Connection();
$con->openConnection();



$GrupoDeUsuarioController = new GrupoDeUsuarioController();

$con->closeConnection();

?>
</section>
<form name="form" method="post" >
	
		

		<ol> 
        
               <li> 
              <label for="nome">
				  <div align="left">Nome:</div>
				</label>
				<div align="left">
				  <input name="nome" type="text" placeholder="Nome do Grupo" />
			  </div>
			</li>
	
            
            
            <li>
				<label for="ID">
				  <div align="left">ID:</div>
				</label>
				<div align="left">
				  <input name="ID" type="text" placeholder="ID" />
			  </div>
			</li>
	
          
          <li>
				<label for="Apelido">
				  <div align="left">Apelido:</diiv>
				</label>
				<div align="left">
				  <input name="Nickname" type="text" placeholder="Apelido" />
		    </div>
		  </li>
            
		
            
            <li>
				<label for="licenca">
				  <div align="left">Quantidade de Licensa: </div>
				</label>
				<div align="left">
				  <input name="licenca" type="number" placeholder="" />
			  </div>
			</li>
            
             
             
             
             <li>
				<label for="vallicenca">
				  <div align="left">Validade da Licença: </div>
				</label>
				<div align="left">
				  <input name="vallicenca" type="date" placeholder="vallicenca" />
			  </div>
            </li>  
            
             
             
             <li>
				<label for="dat_cadastro">
				  <div align="left">Data de Cadastro: </div>
				</label>
				<div align="left">
				  <input name="dat_cadastro" type="date" placeholder="Data de Cadastro" />
			   </div>
            </li>
             
             
             
             <li>
				<label for="status">
				  <div align="left">Status: </div>
				</label>
				<div align="left">
				  <input name="status" type="text" placeholder="   
          Status" />
			  </div>
			</li>
             
		</ol>
	
</form>
</section>
<footer>RODAPE</footer>
</section>   
</section>
</body>
</html>
