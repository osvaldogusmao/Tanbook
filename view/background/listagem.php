<?php
/*
Joao Pedro Evangelista 
20/10/2013
Listagem de imagem

*/

include_once '../../controller/background.controller.class.php';
include_once '../../model/background.class.php';


session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../../view/login/login.php");
}
if ((isset($_GET['action'])) && ($_GET['action'] == 'logout' )) {
  $loginController = new LoginController();
  $loginController->logout();
  header("Location: ../../view/login/login.php");
}

$controller = new BackgroundController();


?>


<!Doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link href="../../css/style.css" rel="stylesheet" type="text/css">
 <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
 <link href="../../css/validation.css" rel="stylesheet" type="text/css">
 <link href="../../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
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


      <?php
      $res = $controller->loadObject($_SESSION['grupoDeUsuario_id'], "grupo_id");

      if (!empty($res)){
       while ($campos = mysql_fetch_array($res));
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
      <?php }else{
        die("Sem dados");
      } ?>
    </table>
  </div>
</div>
</body>
</html>

