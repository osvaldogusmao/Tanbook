<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projeto Tanbook</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body> 

<section id="wrapper">
<header>
LOGO AQUI
</header>
<nav>MENU</nav>
<section id="conteudo">
<?php 
if (!empty($_POST)){

	

    $con = new conexao();
    $con->connect();  
	
    $con->disconnect(); 
	} else  {
    
	echo "Preencha os campos abaixo para cadastrar um novo grupo de usuário";
	}
?>  
</section>

<form action="cadastra.grupodeusuario.php" method="post">
	<fieldset>
		<legend>Cadastro de Grupo de Usuários</legend>

		<ol>
			<li>
				<label for="nome">Nome da Escola:</label>
				<input name="nome" type="text" placeholder="Nome da escola" />
			</li>
            
		  <li>
				<label for="Nickname">Nickname :</label>
				<input name="Nickname" type="text" placeholder="Nickname" />
			</li>
            
			<li>
				<label for="licenca">Licença: </label>
				<input name="licenca" type="number" placeholder="   
          Licença" />
			</li>
            
            <li>
				<label for="vallicenca">Validade da Licença: </label>
				<input name="vallicenca" type="date" placeholder="vallicenca" />
			</li> 
             <li>
				<label for="cod_usuario">Código do Usuário: </label>
				<input name="cod_usuario" type="text" placeholder="Código do Usuário" />
			</li>

			<li>
				<input type="submit" value="Cadastrar" />
			</li>
		</ol>
	</fieldset>
</form>
</section>
<footer>RODAPE</footer>
</section>




</body>
</html>
