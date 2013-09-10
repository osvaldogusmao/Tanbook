<?php 

include_once 'testController.php';

 ?>

<html>
<head>
	<title>Teste View</title>
</head>
<body>

<?php
	
	// Criando uma instância da classe "test" que foi estendida da classe "crud".
	$controller = new Teste();


	//Criando uma instância da classe teste e setado valores
	$teste = new Teste();
	$teste->setNome("Classe de teste");


	//Executando os métodos da classe crud

	//métodos herdados da classe crud
	$controller->save($teste);
	$controller->update($teste, 'id');
	$controller->remove($teste->getId(), 'id');

	//métodos da classe test
	$lista = $controller->lista();

?>

</body>
</html>