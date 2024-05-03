<?php
	require_once '../../orm/Cliente.php';
	require_once '../bd/BD.php';
	
	$cliente = new Cliente();
	$cliente->setEmail($_POST['email']);	
	$cliente->setSenha(md5($_POST['senha']));
	
	$bd = new BD();
	$foiAutenticado = $bd->autentica($cliente);
	
	if ($foiAutenticado)
		print "Usuário Autenticado com Sucesso!";
	else
		print "Usuário ou senha Inválidos";
?>