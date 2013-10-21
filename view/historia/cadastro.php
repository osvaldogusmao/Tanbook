<?php 
include_once "../../controller/historia.controller.class.php";
include_once "../../model/historia.class.php";

session_start();
if (!isset($_SESSION['id'])) {
	 header("Location: ../../view/login/login.php");
}

$controller = new HistoriaController();
$capitulos = new Historia();

if (isset($_POST['submit'])) {

	$capitulos->setId($_POST['id']);
	$capitulos->setGrupoDeUsuario_id($_POST['grupoDeUsuario_id']);
	$capitulos->setNome($_POST['nome']);
	$capitulos->setResenha($_POST['resenha']);
	$capitulos->setAutor($_POST['autor']);
	$capitulos->setDataCriacao($_POST['dataCriacao']);
	$capitulos->setDataPublicacao($_POST['dataPublicacao']);
	$capitulos->setStatus($_POST['status']);
	$capitulos->setCompartilhada($_POST['compartilhada']);

	$fotoCapa = $controller->uploadCapa();

	if(!empty($fotoCapa)){
		$capitulos->setFotoCapa($fotoCapa);
	}

	if($capitulos->getId() > 0){
		$controller->update($capitulos, 'id');
	}else{
		$controller->save($capitulos, 'id');
	}

	header('Location: lista.php');

}
if(isset($_GET['id'])){
	$capitulos = $controller->loadObject($_GET['id'], 'id');
}

 $historias = $controller->listObject();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projeto Tanbook</title>
	<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<section id="wrapper">
<header>
LOGO AQUI
</header>
<nav>MENU</nav>
<section id="conteudo">



	<form action="cadastro.php" method="post" style="padding-left:10px;" enctype="multipart/form-data">
		
		<input type="hidden" name="id" id="id" value="<?php echo ($capitulos->getId() > 0 ) ? $capitulos->getId() : ''; ?>">
		<input type="hidden" name="grupoDeUsuario_id" id="grupoDeUsuario_id" value="1">

		<label for="nome">Nome</label>
		<input type="text" name="nome" id="nome" required value="<?php echo ($capitulos->getId() > 0 ) ? $capitulos->getNome() : ''; ?>">
		<br>

		<label for="resenha">Resenha</label>
		<textarea name="resenha" id="resenha" style="width:205px; height:80px;" required ><?php echo ($capitulos->getId() > 0 ) ? $capitulos->getResenha() : ''; ?></textarea>
		<br>

		<label for="autor">Autor</label>
		<input type="text" id="autor" name="autor" required value="<?php echo ($capitulos->getId() > 0 ) ? $capitulos->getAutor() : ''; ?>">
		<br>

		<label for="dataCriacao">Data de Criação</label>
		<input type="date" name="dataCriacao" id="dataCriacao"  value="<?php echo ($capitulos->getId() > 0 ) ? $capitulos->getDataCriacao() : ''; ?>" >
		<br>

		<label for="dataPublicacao">Data de Publicação</label>
		<input type="date" name="dataPublicacao" id="dataPublicacao" value="<?php echo ($capitulos->getId() > 0 ) ? $capitulos->getDataPublicacao() : ''; ?>">
		<br>

		<label for="status">Status</label>
		<select name="status" id="status">
			<option value="E" <?php echo ($capitulos->getId() > 0 && $capitulos->getStatus() == 'E') ? 'Selected' : ''; ?>>Editando</option>	
			<option value="I" <?php echo ($capitulos->getId() > 0 && $capitulos->getStatus() == 'I') ? 'Selected' : ''; ?>>Inativa</option>
			<option value="P" <?php echo ($capitulos->getId() > 0 && $capitulos->getStatus() == 'P') ? 'Selected' : ''; ?>>Publicada</option>
		</select>
		<br><br>

		<label for="compartilhada">História Pública</label>
		<input type="checkbox" value="S" name="compartilhada" id="compartilhada" <?php echo ($capitulos->getId() > 0 && $capitulos->getCompartilhada() == 'S') ? 'checked' : ''; ?>> Sim
		<br><br>

		<label for="capa">Capa</label>
		<input type="file" name="capa" id="capa" value="Selecione uma Imagem">
		<br>
		<br>

		<?php if (($capitulos->getId() > 0) && !is_null($capitulos->getFotoCapa()) ): 	?>
			<img src="/capas/<?php echo $capitulos->getFotoCapa()?>" alt="">
		<?php endif; ?>
		<br><br>
		<input type="submit" value="Salvar" name="submit">

	</form>

<br>

</section>
<footer>RODAPE</footer>
</section>
</body>
</html>