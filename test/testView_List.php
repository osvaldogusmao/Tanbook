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

		<?php foreach ($teste as $teste) : ?>

			<tr>
				<td><?php echo $teste['id'] ?></td>
				<td><?php echo $teste['nome'] ?></td>
			</tr>	

		<?php endforeach; ?>

	</tbody>
</table>

</body>
</html>