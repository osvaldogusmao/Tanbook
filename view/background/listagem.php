<?php

//include
include_once '../../controller/background.controller.class.php';
include_once '../../model/background.class.php';

//login
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../../view/login/login.php");
}
if ((isset($_GET['action'])) && ($_GET['action'] == 'logout' )) {
  $loginController = new LoginController();
  $loginController->logout();
  header("Location: ../../view/login/login.php");
}
//instancia
$controller = new BackgroundController();


?>


<!Doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Backgrounds</title>
</head>
<body>
 <div id="container">
   <div id="table">
     <table>
       <thead>
        <tr>
          <th>Imagem</th>
          <th>Descrição</th>
          <th>Alterar</th>
          <th></th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $res = $controller->load($_SESSION['grupoDeUsuario_id'], "grupo_id");

        if (isset($res)){
         while ($campos = mysql_fetch_array($res)):
          ?>
        <tr>
          <td>
            <img src="<?php $campos['path'] ?>" alt="background">
          </td>
          <td>
            <?php echo $campos['descricao'] ?>
          </td>
          <td>
            <?php echo $campos['status'] ?>
          </td>
          <td>
            <a href="deletar.php?id=<?php echo $campos['id']?>">Deletar</a>
          </td>
          <a href="editar.php?id=<?php echo $campos['id']?>">Alterar</a>
        </tr>
      <?php  endwhile; }    ?>
  </tbody>
</table>
</div>
</div>
</body>
</html>

