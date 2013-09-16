<?php
include_once "../functions/connection.class.php";
include_once "tipo_usuario.php";
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

$con = new connection();
$con->openConnection();

// Criando a instância da classe e setando a tabela de referência

$tipo_usuario = new tipo_usuario();
$tipo_usuario->setTabela("tipousuario");
	
	
// Invocando o método de Listagem
	
echo $tipo_usuario->listarTipoUsuario();
	
// Fechando a conexão

$con->closeConnection();

?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
