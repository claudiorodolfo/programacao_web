<?php
	require_once '../../orm/Empresa.php';
	require_once '../bd/BD.php';
	
	$bd = new BD();
	$empresas = $bd->selecionaTodos();
	
	print "<table border=2>";
	//cabeçalho da tabela
	print "<tr>";
	print "<th>Id</th>";
	print "<th>Nome</th>";
	print "</tr>";	
	//corpo da tabela	
	foreach($empresas as $e) {
		print "<tr>";
		print "<td>{$e->getId()}</td>";
		print "<td>{$e->getNome()}</td>";
		print "</tr>";
	}
	print "</table>";
?>