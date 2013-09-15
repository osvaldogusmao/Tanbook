<?php
include_once "../functions/connection.class.php";
include_once "usuario.php";
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

// Criando a instância da classe e setando a tabela de referência

$usuario = new usuario();
$usuario->setUsuarioSemCodigo("Usuario Teste" , "email@teste.com" , "M" , "usuario.teste" , md5("teste") , "1990-01-01" , "http://www.facebook.com/zuck" , "zuck" , "2");	

//$usuario->save($usuario);

$usuario_controller = new usuarioControl();

// Invocando o método de Listagem
	
echo $usuario_controller->listarUsuario();

$usuario_controller->save($usuario);


?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
