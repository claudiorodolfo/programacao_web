<?php

require_once '../../orm/Cliente.class.php';

class BD {

	public function cadastra($cliente) {
		$bd = mysqli_connect('localhost', 'root', '', 'Projeto');
		//Exemplo de instrução SQL
		//insert into cliente (nome,email,id_empresa) values ('Claudio Rodolfo', 'claudiorodolfo@ifba.edu.br', 1)
		$sql = "insert into cliente (nome,email,id_empresa) values ('{$cliente->getNome()}','{$cliente->getEmail()}',{$cliente->getIdEmpresa()})";
		//print $sql;
		print 'Cadastro realizado com sucesso!';
		
		mysqli_query($bd, $sql);
		mysqli_close($bd);
	}	

	public function apaga($cliente) {

	}

	public function atualiza($cliente) {

	}

	public function seleciona($cliente) {

	}

	public function selecionaTodos() {

	}	
}
?>