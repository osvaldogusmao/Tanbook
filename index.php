<?php
	
	session_start();
	echo "Imprimindo sessão com id do usuario para teste ".$_SESSION['id'];
?>
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
<a href="index.php">Logout Teste</a>
<section id="conteudo">
INSIRA SEU CODIGO AQUI </br>

<a href="view/tipodeusuario/lista.php"> Lista Tipo usuario</a>
</section>
<footer>RODAPE</footer>
</section>
</body>
</html>