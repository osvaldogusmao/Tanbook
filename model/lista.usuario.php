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
// Conectando no banco de dados

$con = new Connection();
$con->openConnection();

// Criando a instância da classe e setando a tabela de referência

$usuario = new usuario();
$usuario->setTabela("usuario");
	
	
// Invocando o método de Listagem
	
echo $usuario->listarUsuario();
	
// Fechando a conexão

$con->closeConnection();

?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
