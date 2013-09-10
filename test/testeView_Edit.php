<?php 

include_once 'testController.php';
include_once 'testModel.php';

if(isset($_POST)){

	// Criando uma instância da classe "testController" que foi estendida da classe "crud".
	$controller = new TestController();
	
	// Criando uma instância da classe Teste (Model)
	$teste = new Teste();
	$teste->setNome($_POST['nome']);
	/* Observação: não "setei" o atributo ID, pois ele é uma campo auto_increment no banco e por este motivo o id 
	 * inserido automaticamente
	 */

	if($controller->save($teste)) {
		echo "Teste salvo com sucesso";
	}else{
		echo "Erro ao salvar";
	}

}

?>

<html>
<head>
	<title>Teste View</title>
</head>
<body>

<form action="/test/testeView_Edit.php" method="post">

	<label>ID</label>
	<input type="text" id="id" name="id">

	<label>Nome</label>
	<input type="text" id="nome" name="nome">

	<input type="submit" value="Salvar">

</form>


</body>
</html>