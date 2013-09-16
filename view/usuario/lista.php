﻿<?php

/*
	Descrição do arquivo: Esta é a pagina responsavel pos listar todos os usuarios
	@autor - Lukas Roberto
	@data de criação - 07/09/2013
	@arquivo - lista.php

*/

include_once "../../controller/lista.usuario.controller.class.php";

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
  <header> LOGO AQUI </header>
  <nav>MENU</nav>
  <section id="conteudo">
    <p>
      <?php
	  $idUsuario = NULL;
	  if(isset($_POST["idUsuario"])){
		$idUsuario = $_POST["idUsuario"];
		}

	$usuario_controller = new usuarioControl();
	$resultados = $usuario_controller->listarUsuario($idUsuario);	

	?>
      <?php 
			//verifica se existem usuarios cadastrados, se existirem lista os usuarios
			if ($resultados){
		?>
    <div id="filtro">
      <form name="form1" method="post" action="lista.php">
        <label for="idUsuario"></label>
        <input type="text" name="idUsuario" id="idUsuario">
        <input type="submit" name="button" id="button" value="Buscar">
      </form>
    </div>
    </p>
    <p>&nbsp;</p>
    <table>
      <thead>
        <tr>
          <th>Avatar</th>
          <th>Apelido</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Sexo</th>
          <th>Data de Nascimento</th>
          <th>Facebook</th>
          <th>Tipo de Usuário</th>
          <th>Grupo do Usuário</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
				while($campos = mysql_fetch_array($resultados)):
		?>
        <tr>
          <td><?php echo $campos["avatar"] ?></td>
          <td><?php echo $campos["apelido"] ?></td>
          <td><?php echo $campos["nome"] ?></td>
          <td><?php echo $campos["email"] ?></td>
          <td><?php echo $campos["sexo"] ?></td>
          <td><?php echo $campos["dataDeNascimento"] ?></td>
          <td><?php echo $campos["urlFacebook"] ?></td>
          <td><?php echo $campos["tipoDeUsuario_id"] ?></td>
          <td><?php echo $campos["grupoDeUsuario_id"] ?></td>
          <td><a href="editar.php?id=<?php echo $campos["id"] ?>" class="tbListaUsuario">Editar</a></td>
          <td><a href="excluir.php?id=<?php echo $campos["id"] ?>" class="tbListaUsuario">Excluir</a></td>
        </tr>
        <?php
		  		endwhile;
		?>
      </tbody>
    </table>
    <?php		
                //se não existir usuarios cadastrados, exibe menssagem	
	  		}else{
		?>
    <div class="alerta"> Sem Usuários Cadastrados </div>
    <?php
				}
 		  ?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>