<?php 
	include_once 'functions/configurations.php';

?>
<!--Acesso ao GitHub OK - Lukas Roberto -->

<!--Acesso ao GitHub OK - Mauricio Andrade -->

<!--Acesso ao GitHub OK - Rafael Freitas -->

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
</head> 
<body>

	<h1>Aula Teste</h1>
	<p>
		<?php 
			echo "teste php <br/>"; 
			$title = "Novo Projeto";
			include_once 'functions/configurations.php';
			echo $title;
		?>
	</p>

</body>
</html>