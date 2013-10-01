<!--
  Descrição do arquivo: View responsavel pelo cadastro de história
  @autor - Osvaldo Gusmão
  @data de criação - 01/10/2013
  @arquivo - historia/cadastro.php
 -->

<?php 


include_once "../../controller/historia.controller.php";
include_once "../../model/historia.class.php";

$controller = new HistoriaController();
$historia = new Historia();

if (isset($_POST['submit'])) {

	$historia->setId($_POST['id']);
	$historia->setGrupoDeUsuario_id($_POST['grupoDeUsuario_id']);
	$historia->setNome($_POST['nome']);
	$historia->setResenha($_POST['resenha']);
	$historia->setAutor($_POST['autor']);
	$historia->setDataCriacao($_POST['dataCriacao']);
	$historia->setDataPublicacao($_POST['dataPublicacao']);
	$historia->setStatus($_POST['status']);
	$historia->setCompartilhada($_POST['compartilhada']);

	$fotoCapa = $controller->uploadCapa();

	if(!empty($fotoCapa)){
		$historia->setFotoCapa($fotoCapa);
	}

	if($historia->getId() > 0){
		$controller->update($historia, 'id');
		print_r('update');
	}else{
		$controller->save($historia, 'id');
		print_r('save');
	}

}

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
		
		<input type="hidden" name="id" id="id">
		<input type="hidden" name="grupoDeUsuario_id" id="grupoDeUsuario_id" value="1">

		<label for="nome">Nome</label>
		<input type="text" name="nome" id="nome" required>
		<br>

		<label for="resenha">Resenha</label>
		<textarea name="resenha" id="resenha" style="width:205px; height:80px;" required></textarea>
		<br>

		<label for="autor">Autor</label>
		<input type="text" id="autor" name="autor" required>
		<br>

		<label for="dataCriacao">Data de Criação</label>
		<input type="date" name="dataCriacao" id="dataCriacao" format="dd/mm/yyyy">
		<br>

		<label for="dataPublicacao">Data de Publicação</label>
		<input type="date" name="dataPublicacao" id="dataPublicacao">
		<br>

		<label for="status">Status</label>
		<select name="status" id="status">
			<option value="E" selected>Editando</option>	
			<option value="I">Inativa</option>
			<option value="P">Publicada</option>
		</select>
		<br><br>

		<label for="compartilhada">História Pública</label>
		<input type="checkbox" value="S" name="compartilhada" id="compartilhada"> Sim
		<br><br>

		<label for="capa">Capa</label>
		<input type="file" name="capa" id="capa" value="Selecione uma Imagem">
		<br>
		<br>

		<input type="submit" value="Salvar" name="submit">

	</form>

<br>

</section>
<footer>RODAPE</footer>
</section>
</body>
</html>