<?php
	
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: view/login/login.php");
	}


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
<section id="conteudo">
INSIRA SEU CODIGO AQUI </br>
<a href="view/tipodeusuario/lista.php"> Lista Tipo usuario</a>
</section>
<footer>RODAPE</footer>
</section>
</body>
</html>