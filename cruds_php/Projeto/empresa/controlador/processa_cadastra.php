<?php
	require_once '../../orm/Empresa.php';
	require_once '../bd/BD.php';
	
	$empresa = new Empresa();
	$empresa->setNome($_POST['nome']);
	
	$bd = new BD();
	$bd->cadastra($empresa);
?>