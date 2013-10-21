<?php

/*
Joao Pedro Evangelista
20/10/2013
Upload de imagem

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
$model = new Background();
$dirPath = "../../backgrounds/";

if(isset($_POST['btn'])){

  $image_info = getimagesize($_FILES["file"]["tmp_name"]);
  $image_width = $image_info[0];
  $image_height = $image_info[1];
  $extensionAllowed = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if(($image_height>800
     || $image_width >600)
    && (($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && in_array($extension, $extensionAllowed)
    && file_exists($dirPath . $_FILES["file"]["name"])
    )
  {

    echo "Arquivo Invalido!";
  }else{
    chmod($dirPath, 0777);
    move_uploaded_file($_FILES["file"]["tmp_name"],
                       $dirPath . $_FILES["file"]["name"]);


    $model->setPath($dirPath.$_FILES["file"]["name"]);
    $model->setGrupo_id($_SESSION["grupoDeUsuario_id"]);
    $model->setDescricao($_POST["descricao"]);
    $model->getStatus($_POST["status"]);

    $controller->save($model);

  }


}

?>


<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link href="../../css/style.css" rel="stylesheet" type="text/css">
 <link href="../../css/bootstrap.css" rel="stylesheet">
 <link href="../../css/validation.css" rel="stylesheet">
 <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
 <title>Upload Imagem</title>
</head>
<body>
 <div id="container">
   <div id="form">
     <form action="cadastro.php" method="POST" enctype="multipart/form-data">

      <label for="status">Status</label>
      <input type="text" id="status" name="status">
      <label for="descricao">Descrição</label>
      <input type="text" id="descricao" name="descricao">
      <label for="file">Arquivo:</label>
      <input type="file" id="file" name="file">
      <input type="submit" value="Enviar" name="btn">

    </form>
  </div>
</div>
</body>
</html>
