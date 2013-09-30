<?php
	include_once '../../controller/login.controller.class.php';

	include_once '../../model/logdeacesso.class.php';

	$loginController = new LoginController();
	$email= 'email';
	$valueEmail='teste@hotmail.com';
	$senha='senha';
	$valueSenha = '12345';
	$result = $loginController->login($email , $valueEmail ,$senha , $valueSenha);

	echo $result;

	$logDeAcesso = new LogDeAcesso();
	date_default_timezone_set('America/Sao_Paulo');
	$data = date('d/m/Y');

	$logDeAcesso->setsetUsuario_id= '1';
	$logDeAcesso->setDataAcesso = $data;


	$resultSave = $loginController->saveLog($logDeAcesso);

echo $resultSave;
?>	