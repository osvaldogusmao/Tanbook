<?php
include_once "../../controller/lista.usuario.controller.class.php"; //include inserido para testes Lukas Roberto

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Projeto Tanbook</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
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
						while($campos = mysql_fetch_array($resultados)): ?>
        <tr>
          <td><?php echo $campos["codigo"] ?></td>
          <td><?php echo $campos["nome_completo"] ?></td>
          <td><a href="editar.php?codigo=<?php echo $campos["codigo"] ?>" class="tbListaUsuario">Editar</a></td>
          <td><a href="excluir.php?codigo=<?php echo $campos["codigo"] ?>" class="tbListaUsuario">Editar</a></td>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
