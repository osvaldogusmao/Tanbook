<!--
	Descrição do arquivo: Esta é a tela de Login do usuário
	@autor - Lukas Roberto
	@data de criação - 28/09/2013
	@arquivo - login.php
-->
<?php

include_once '../../controller/login.controller.class.php';
include_once '../../model/logdeacesso.class.php';
include_once '../../controller/logdeacesso.controller.class.php';

$loginController = new LoginController();

if (isset($_POST["email"]) ||  isset($_POST["senha"])){
      $result = $loginController->login('email' , $_POST['email'] ,'senha' , $_POST['senha']);
      $quantidadeDeDados = mysql_num_rows($result);
      if ($quantidadeDeDados == '1') {
          $usuario = mysql_fetch_array($result);
          session_start();
          $_SESSION["id"] = $usuario["id"];
          $_SESSION["grupoDeUsuario_id"] = $usuario["grupoDeUsuario_id"];

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
<title>Tanbook</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Estilos -->
<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/login.css" rel="stylesheet">
<link href="../../css/validation.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <form class="form-signin" action="login.php" method="post" id="form-login">
  <fieldset>
    <h1>Login Tanbook</h1>
    <div class="control-group">
      <div class="controls">
        <input type="text" placeholder="Usuário" id="email" name="email"/>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="password" placeholder="Senha" id="senha" name="senha"/>
      </div>
    </div>
    <div>
      <input type="submit" value="Entrar" class="btn"/>
      <a href="#">Esqueceu sua senha?</a> <a href="#">Registre-se</a> </div>
  </fieldset>
  </form>
  <!-- form -->
</div>
<!-- content -->
</div>
<!-- container -->
<!-- Javascript -->
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery.validate.min.js"></script>
<script src="../../js/bootstrap-transition.js"></script>
<script src="../../js/bootstrap-alert.js"></script>
<script src="../../js/bootstrap-modal.js"></script>
<script src="../../js/bootstrap-dropdown.js"></script>
<script src="../../js/bootstrap-scrollspy.js"></script>
<script src="../../js/bootstrap-tab.js"></script>
<script src="../../js/bootstrap-tooltip.js"></script>
<script src="../../js/bootstrap-popover.js"></script>
<script src="../../js/bootstrap-button.js"></script>
<script src="../../js/bootstrap-collapse.js"></script>
<script src="../../js/bootstrap-carousel.js"></script>
<script src="../../js/bootstrap-typeahead.js"></script>
<script>
        $(document).ready(function(){

         $('#form-login').validate(
         {
          rules: {
            email: {
              minlength: 2,
              required: true
            },
            senha: {
              required: true            }
          },
          highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
          },
          success: function(element) {
            element
            .text('OK!').addClass('valid')
            .closest('.control-group').removeClass('error').addClass('success');
          }
         });
        });
        </script>
</body>
</html>
