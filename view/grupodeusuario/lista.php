<?php
/*

  View ListaGrupoDeUsuario (listar todos os grupos de usuarios cadastrados no banco.)
  @author Rafael Freitas
  @date 17/09/2013 – Data da criação do arquivo
  @nameFile lista.GrupoDeUsuario.class.php (ListaGrupoDeUsuario)

*/
include_once "../../functions/connection.class.php";
include_once "../../controller/GrupoDeUsuario.controller.class.php";
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

$GrupoDeUsuarioController = new GrupoDeUsuarioController();

	
	
// Invocando o método de Listagem
	
echo $GrupoDeUsuarioController->listarGrupoDeUsuario();
	
// Fechando a conexão

$con->closeConnection();

?>
  </section>
  <footer>RODAPE</footer>
</section>
</body>
</html>
