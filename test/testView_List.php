<?php 

include_once 'testController.php';

// Criando uma instância da classe "test" que foi estendida da classe "crud".
$controller = new TestController();

//métodos da classe test
$testes = $controller->lista();

?>

<html>
<head>
	<title>Teste View</title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
		</tr>	
	</thead>
	<tbody>

		<?php while ($teste = mysql_fetch_assoc($testes)) : ?>
			<tr>
				<td><?php echo $teste['id'] ?></td>
				<td><?php echo $teste['nome'] ?></td>
			</tr>	

		<?php endwhile; ?>

	</tbody>
</table>

<br>
<a href="testView_Edit.php">Novo</a>

</body>
</html>