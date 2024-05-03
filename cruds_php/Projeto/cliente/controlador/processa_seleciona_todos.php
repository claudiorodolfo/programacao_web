<?php
	require_once '../../orm/Cliente.php';
	require_once '../bd/BD.php';
	
	$bd = new BD();
	$clientes = $bd->selecionaTodos();
	
	print "<table border=2>";
	//cabeçalho da tabela
	print "<tr>";
	print "<th>Id</th>";
	print "<th>Nome</th>";
	print "<th>E-mail</th>";
	print "<th>Id Empresa</th>";
	print "</tr>";	
	//corpo da tabela	
	foreach($clientes as $c) {
		print "<tr>";
		print "<td>{$c->getId()}</td>";
		print "<td>{$c->getNome()}</td>";
		print "<td>{$c->getEmail()}</td>";
		print "<td>{$c->getIdEmpresa()}</td>";
		print "</tr>";
	}
	print "</table>";
?>