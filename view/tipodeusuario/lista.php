<?php
/*
	Descrição do arquivo
	@autor - Rafael de Pádua
	@data de criação - 16/09/2013
	@arquivo - lista.php
*/

include_once '../../controller/tipodeusuario.controller.class.php';
$usuario = new TipoUsuarioController();
$resultados = $usuario -> lista();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projeto Tanbook</title>
	<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<section id="wrapper">
<header>
LOGO AQUI
</header>
<nav>MENU</nav>
<section id="conteudo">

	 <h1>Tipos de Usuarios Cadastrados</h1>
	 <table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($campos = mysql_fetch_array($resultados)):?>
				<tr>
					<td><?php echo $campos["id"] ?></td>
					<td><?php echo $campos["nome"] ?></td>
					<td><?php echo $campos["descricao"]?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</section>
<footer>RODAPE</footer>
</section>
</body>
</html>