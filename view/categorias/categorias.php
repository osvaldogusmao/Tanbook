<?php

/*
	Descrição do arquivo: Esta é a pagina responsavel pos Cadastrar, listar e Editar todas as Categorias
	@autor - Lukas Roberto
	@data de criação - 28/09/2013
	@arquivo - categorias.php

*/

include_once "../../controller/categoria.controller.class.php";
include_once "../../model/categoria.class.php";

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
  <header> LOGO AQUI </header>
  <nav>MENU</nav>
  <section id="conteudo">
    <p>
      <?php
	$categoria_controller = new categoriaController();
	$resultados = $categoria_controller->listarCategoria();	

	?>
       <div id="cadastrar">
      <form name="form1" method="post" action="categoria.controller.class.php">
        <label for="idCategoria"></label>
        Código: 
        <input name="idCategoria" type="text" id="idCategoria" size="5" maxlength="10" readonly="readonly">
        <br>
        Nome da Categoria:
        <input type="text" name="categoria" id="categoria">
        <br>
        <input type="submit" name="button" id="button" value="Cadastrar">
      </form>
      </div>
      <?php 
			//verifica se existem Categorias cadastrados, se existirem lista as Categorias
			if ($resultados){
		?>
 
      <div id="listaDeCategorias">
    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Categoria</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
				while($campos = mysql_fetch_array($resultados)):
		?>
        <tr>
          <td><?php echo $campos["idCategoria"] ?></td>
          <td><?php echo $campos["nomeCategoria"] ?></td>
          <td><a href="editar.php?id=<?php echo $campos["id"] ?>" class="tbListaUsuario">Editar</a></td>
          <td><a href="categoria.controller.class.php?id=<?php echo $campos["id"] ?>" class="tbListaUsuario">Excluir</a></td>
        </tr>
        <?php
		  		endwhile;
		?>
      </tbody>
    </table>
     </div>
    <?php		
                //se não existir Categorias cadastrados, exibe menssagem	
	  		}else{
		?>
    <div class="alerta"> Sem Categorias Cadastradas </div>
    <?php
				}
 		  ?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
