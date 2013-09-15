<?php
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
    <?php

$usuario_controller = new usuarioControl();
$resultados = $usuario_controller->listarUsuario();

?>
        <?php 
			//verifica se existem usuarios cadastrados, se existirem lista os usuarios
			if ($resultados){
		?>
    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome Completo</th>
          <th>Alterar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
		<?php
				while($campos = mysql_fetch_array($resultados)): 
		?>
        <tr>
          <td><?php echo $campos["id"] ?></td>
          <td><?php echo $campos["nome"] ?></td>
          <td><a href="editar.php?codigo=<?php echo $campos["id"] ?>" class="tbListaUsuario">Editar</a></td>
          <td><a href="excluir.php?codigo=<?php echo $campos["id"] ?>" class="tbListaUsuario">Editar</a></td>
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
