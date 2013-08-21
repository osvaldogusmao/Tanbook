<?php 
	include_once 'functions/configurations.php';

?>
<!-- Página Index - Projeto  -->
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