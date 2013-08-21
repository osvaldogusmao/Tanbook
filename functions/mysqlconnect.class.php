<?php 

	$dbname = "";
	$dbuser = "";
	$dbpass = "";
	$dbhost = "";

	if(!($id = mysql_connect($dbhost, $dbuser, $dbpass))){
		echo "Nào foi possivel estabelecer conexão";
		exit;
	}


	if(!($conn = mysql_select_db($dbname, $id))){
		echo "Não foi possivel selecionar a base de dados!";
	}

 ?>