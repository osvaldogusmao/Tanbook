<?php 

include_once 'testController.php';
include_once 'testModel.php';

// Criando uma instância da classe "testController" que foi estendida da classe "crud".
$controller = new TestController();

// Criando uma instância da classe Teste (Model)
$teste = new Teste();

$id = ( isset($_GET['id']) )  ? $_GET['id'] : 0;

if( $id > 0 ){
	$load = $controller->load($id, 'id');

	$teste->setId($load['id']);
	$teste->setNome($load['nome']);
}


if(isset($_POST['nome'])){

	$teste->setId( ( isset($_POST['id']) ) ? $_POST['id'] : 0 );

	$teste->setNome($_POST['nome']);


	if( $teste->getId() == 0 ){
		$controller->save($teste);
	}else{
		$controller->update($teste, 'id');
	}

	//header('Location: testView_List.php');

}

?>

<html>
<head>
	<title>Teste View</title>
</head>
<body>

<form action="testView_Edit.php" method="post">

	<input type="hidden" id="id" name="id" value="<?php  echo ( !is_null( $teste->getId() ) ) ? $teste->getId() : '';  ?> " >

	<label>Nome</label>
	<input type="text" id="nome" name="nome" required value="<?php echo ( !is_null( $teste->getNome() ) ) ? $teste->getNome() : '';  ?>" >

	<input type="submit" value="Salvar">

</form>

<a href="testView_List.php">Listar tudo</a>

</body>
</html>