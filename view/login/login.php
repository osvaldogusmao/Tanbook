<!-- 
	Descrição do arquivo: Esta é a tela de Login do usuario
	@autor - Lukas Roberto
	@data de criação - 28/09/2013
	@arquivo - login.php
-->
<?php
  
    include_once '../../controller/login.controller.class.php';
    include_once '../../model/logdeacesso.class.php';
    include_once '../../controller/logDeAcesso.controller.class.php';
    
    $loginController = new LoginController();

if (isset($_POST["email"]) ||  isset($_POST["senha"])){
      $result = $loginController->login('email' , $_POST['email'] ,'senha' , $_POST['senha']);
      $quantidadeDeDados = mysql_num_rows($result);
      if ($quantidadeDeDados == '1') {
          $usuario = mysql_fetch_array($result);
          session_start();
          $_SESSION["id"] = $usuario["id"];

          $logDeAcessoController = new LogDeAcessoController();
          $logDeAcesso = new LogDeAcesso();
          $logDeAcesso->setUsuario_id($usuario["id"]);
          $logDeAcesso->setDataAcesso(date('Y/m/d H:i:s'));
          $logDeAcessoController->save($logDeAcesso);

          header("Location: ../../index.php");
      }else{
          header("Location: login.php");
      }
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
<section id="wrapperLogin">
  <section id="content">
    <form action="login.php" method="post">
      <h1>Login Tanbook</h1>
      <div>
        <input type="text" placeholder="Usuário" required id="username" id="email" name="email"/>
      </div>
      <div>
        <input type="password" placeholder="Senha" required id="password" id="senha" name="senha"/>
      </div>
      <div>
        <input type="submit" value="Entrar" />
        <a href="#">Esqueceu sua senha?</a> <a href="#">Registre-se</a> </div>
    </form>
    <!-- form --> 
  </section>
  <!-- content -->
  </div>
  <!-- container --> 
</section>
</body>
</html>
