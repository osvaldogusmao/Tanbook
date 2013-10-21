
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


$dirPath ="../../backgrounds/" ;

function setChmod()
{
    chmod($dirPath, 0777);
}
function check()
{
    $image_info = getimagesize($_FILES["file_field_name"]["tmp_name"]);
    $image_width = $image_info[0];
    $image_height = $image_info[1];

    if(($_FILES["file"]["size"] > 256000)
       || ($_FILES["file"]["type"] !="image/png")
       || ($_FILES["file"]["type"] !="image/jpg"))
    {
        echo "Arquivo Invalido";
        if (file_exists($dirPath . $_FILES["file"]["name"]))
        {
            echo "Arquivo já existe";

            if ($image_height>800 || $image_width >600) {
                echo "Arquivo possui dimensoes alem das permitidas";
            }
        }
        return false;
    }else{
        $this->setChmod();
        move_uploaded_file($_FILES["file"]["tmp_name"],
                           $dirPath . $_FILES["file"]["name"]);
    }
}


$controller = new BackgroundController();
$model = new Background();

$model->setPath($dirPath.$FILES["file"]["name"]);
$model->setGrupo_id($_SESSION["grupo_id"]);
$model->setDescricao($_GET['descricao']);
$model->getStatus($_GET['status']);

$controller->save($model);


?>


<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Document</title>
</head>
<body>
 <div id="container">
     <div id="form">
         <form action="cadastro.php" method="GET">

            <label for="status">Status</label>
            <input type="text" id="status" name="status">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao">
            <label for="file">Arquivo:</label>
            <input type="file" id="file" name="file">
            <input type="button" value="enviar">

        </form>
    </div>
</div>
</body>
</html>