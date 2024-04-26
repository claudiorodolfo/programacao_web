<?php
	require_once '../../orm/Cliente.class.php';
	require_once '../bd/BD.php';
	
	$cliente = new Cliente();
	$cliente->setNome($_POST['nome']);
	$cliente->setEmail($_POST['email']);	
	$cliente->setIdEmpresa($_POST['id_empresa']);	
	
	$bd = new BD();
	$bd->cadastra($cliente);
?>